<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desk;
use App\Models\Menu;
use App\Models\Stack;
// use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentStack = 0;
        if(auth()->check()){
            if(auth()->user()->stack){
                $currentStack = auth()->user()->stack->desk_id;
            }
        }
        return view('home', [
            'dataLists' => Desk::paginate(),
            'menuLists' => Menu::latest()->get(),
            'currentStack' => $currentStack,
            'stacks' => Stack::select('desk_id')->get(),
        ]);
    }
}
