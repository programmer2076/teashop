<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Desk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.desks.desk', [
            'dataLists' => Desk::paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.desks.createDesk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->getValidate();
        $desk = new Desk;
        $desk->tag = $request->tag;
        if($request->has('image')){
            $img = time().base64_encode($request->image->getBaseName());
            if($request->image->getSize() < 400000){
                $request->image->move(public_path('images/desk/'), $img);

                $desk->image = $img;
            }else{
                return back()->with('warning', 'Image size is too much');
            }
        }
        $desk->save();
        return back()->with('status', 'Saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desk  $desk
     * @return \Illuminate\Http\Response
     */
    public function show(Desk $desk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desk  $desk
     * @return \Illuminate\Http\Response
     */
    public function edit(Desk $desk)
    {
        return view('backend.desks.editDesk', [
            'data' => $desk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Desk  $desk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desk $desk)
    {
        
        $this->getValidate();


        $desk->tag = $request->tag;

        if($request->has('image')){
            if(File::exists(public_path("images/desk/$desk->image"))){
                File::delete(public_path("images/desk/$desk->image"));
            }
            
            $img = time().base64_encode($request->image->getBaseName());
            if($request->image->getSize() < 400000){
                $request->image->move(public_path('images/desk/'), $img);

                $desk->image = $img;
            }else{
                return back()->with('warning', 'Image size is too much');
            }
        }
        $desk->save();
        return back()->with('status', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desk  $desk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desk $desk)
    {
        if(File::exists(public_path("images/expense/$expense->image"))){
            File::delete(public_path("images/expense/$expense->image"));
        }
        $expense->delete();
        return redirect(route('expense'))->with('warning', 'Deleted successfully');
    }

    public function delete(Expense $expense)
    {
        return view('frontend.deleteBudget',
            [
                'data' => $expense,
                'type' => 'Expense',
            ]
        );
    }

            /**
     * @return array
     */
    public function getValidate(): array
    {
        return request()->validate([
            'image'=>['required'],
        ]);
    }

    public function getValidateBK(): array
    {
        return request()->validate([
            'category_id'=>['required'],
            'amount'=>['numeric'],
            'date'=>['required'],
        ]);
    }
}
