<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desk;
use App\Models\Stack;
use App\Models\MenuStack;
use App\Http\Resources\DeskResource;
use Illuminate\Support\Facades\Auth;

class TableController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Auth::user()->stack;
        if($data == null){
            $token = substr(bin2hex(random_bytes(6)), 6);
            $data = Stack::create([
                'user_id' => Auth::user()->id,
                'desk_id' => $request->id,
                'token' => $token,
                'state' => true,
            ]);
            return response()->json([
                'status' => 201,
                'data' => $data,
            ], 201);
        }else{
            $previus = $data->desk_id;
            $data->update([
                'desk_id' => $request->id
            ]);
            return response()->json([
                'status' => 201,
                'data' => $data,
                'previus' => $previus,
            ], 201);
        }           
        // $token = substr(md5(uniqid(rand(), true)), 16, 16); // 16 characters long
            // $token = substr(bin2hex(random_bytes(6)), 16, 16); // 16 characters long

            
            // return response()->json([
            //     'status' => 201,
            //     'data' => $data,
            // ], 201);
        
        // return new DeskResource($data);
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
