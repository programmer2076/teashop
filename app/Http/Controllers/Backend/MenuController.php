<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Services\Money;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menus.createMenu', [
            'categories' => Category::all(),
        ]);
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


        $menu = new Menu;
        $menu->category_id = $request->category_id;
        $request->has('promote') ? $menu->promote = true : '';
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = Money::toCent($request->price);

        if($request->has('image')){
            $img = time().base64_encode($request->image->getBaseName());
            if($request->image->getSize() < 400000){
                $request->image->move(public_path('images/menu/'), $img);

                $menu->image = $img;
            }else{
                return back()->with('warning', 'Image size is too much');
            }
        }
        $menu->save();
        return back()->with('status', 'Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function getValidate(): array
    {
        return request()->validate([
            'category_id'=>['integer', 'required'],
            'name'=>['string', 'required'],
            'price'=>['numeric', 'required'],
            'image'=>['required'],
        ]);
    }
}
