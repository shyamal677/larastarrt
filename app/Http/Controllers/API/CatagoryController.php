<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Catagory;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Catagory::orderBy('created_at','asc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = request()->validate([
            'catagory_name'=>'required',
            'description' =>'required'
        ]);
      
         Catagory::create([
             'catagory_name' =>$validate['catagory_name'],
             'description' =>$validate['description'], 
         ]);

         return(['message' => 'task was successful']);
        
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catagory $catagory)
    {
        $validate = request()->validate([
            'catagory_name'=>'required',
            'description' =>'required'
        ]);
      
        $catagory->update([
            'catagory_name' =>$validate['catagory_name'],
            'description' =>$validate['description'], 
        ]);

         return(['message' => 'task was successfuly updated ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catagory $catagory)
    {
         $catagory->delete();

         return ['message' => 'deleted succes'];
    }
}
