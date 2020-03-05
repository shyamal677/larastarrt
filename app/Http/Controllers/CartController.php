<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Cart;
use App\Product;
use Session;
use Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        
        return view('pages.cart',['orders'=>$cart->items, 'totalPrice'=>$cart->totalprice]);

      //  return view('pages.cart');
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
      $validate = request()->validate([
        'contactNo'=>'required',
        'address'=>'required | min:10'
        ]);

        return $validate;
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
        $product = Product::findOrFail($id);
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->add($product,$product->id,$request->quntity);
        $request->session()->put('cart',$cart);
        
        return Redirect::back();

      //  return $id;
    }


    public function remove(Request $request,$id)
    {
      $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->remove($id);
        if($cart->totalqty > 0){
          $request->session()->put('cart',$cart);
        }else{
          $request->session()->forget('cart');
        }
       
        
        return Redirect::back();
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
