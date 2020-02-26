<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return Product::orderBy('created_at','asc');
       return Product::orderBy('created_at','asc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validate = request()->validate([
        //     'product_name' =>'required',
        //     'catagory' => 'required',
        //     'price' => 'required',
        //     'quntity' => 'required',
        //     'image_5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'image_1' => 'image|nullable|max:1999',
        //     'image_3' => 'image|nullable|max:1999',
        //     'image_4' => 'image|nullable|max:1999'
        // ]);

        // return $validate;

        $imageName = time().'.'.request()->image_1->getClientOriginalExtension();

  

        request()->image_1->move(public_path('images'), $imageName);

        return $request->all();
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
