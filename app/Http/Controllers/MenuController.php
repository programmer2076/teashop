<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuStack;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
// use PDF;

class MenuController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu');
    }

    public function order()
    {
        $stack = auth()->user()->stack;
        
        if($stack != null){
            $menuStack = $stack->menuStacks()->where('status', 0)->get();
            return view('order',  [
                'dataLists' => $menuStack,
                'totalAmount' => $menuStack->sum('price') / 100,
            ]);
        }

        return view('order',  [
            'dataLists' => []
        ]);
    }

    public function checkout(){
        // return redirect()->route('login');
        $stack = auth()->user()->stack;
        if($stack != null){
            $menuStack = $stack->menuStacks()->where('status', 0)->get();
        $amount = $menuStack->sum('price');
        // Generate to report
        $chk = [];
        foreach($menuStack as $k => $v){
            $data = ['id' => ++$k, 'price'=> $v->price, 'item'=>$v->menu->name, 'date' => $v->created_at];
            $chk[] = $data;
            
        }
        Checkout::create([
            'user_id' => Auth::user()->id,
            'amount' => $amount,
            'status' => true,
            'log' => serialize($chk),
          ]);

        menuStack::where('status', 0)->where('stack_id', $stack->id)
            ->where('user_id', Auth::user()->id)->update(['status' => 1]);


      $stack->delete();

      return view('orderSuccess',  [
        'dataLists' => $menuStack != null ? $menuStack : [],
        'totalAmount' => $amount / 100,
    ]);
        }
        return redirect()->route('home');
    }

    public function bulk()
    {
        return Menu::all();
        // return Menu::with('category:name')->get();
        // return $menu = Menu::all();
        // return $menu->with('category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // retreive all records from db
        $chk = Checkout::latest()->first();
        $dataLists = \unserialize($chk->log);
        $data = [
            'title' => 'Mi Mi Tea Shop',
            'dataLists' => $dataLists,
            'totalAmount' => $chk->amount / 100,
            'theDate' =>$chk->created_at->format("Y-m-d"),

        ]; 
        // share data to view
        view()->share('loadPDF',$data);
        $pdf = PDF::loadView('loadPDF', $data)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('pdf_file.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->stack == null){
            return redirect(route('home'));
        }
        $alpha = $request->data;
        $data = (array)\json_decode("$alpha");
        $beta = array_values($data);
        // Bad database operation
        for($i = 0; $i < count($beta); $i++){
            $menu = Menu::find($beta[$i]);
            MenuStack::create([
                'user_id' => Auth::user()->id,
                'stack_id' => Auth::user()->stack->id,
                'menu_id' => $menu->id,
                'price' => $menu->price,
            ]);

        }
        
        return response()->json([
            'status' => 201,            
        ], 201);
    }
}
