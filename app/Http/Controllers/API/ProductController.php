<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
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

    public function show_items($id)
    {
        return Product::where('catagory', $id)->paginate(10);
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
            'product_name' =>'required',
            'catagory' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quntity' => 'required',
            
        ]);

        

        
           
            if($request->image_1){
                $name1 = time().'.'. explode('/', explode(':',substr($request->image_1,0,strpos($request->image_1,';')))[1])[1];
                Image::make($request->image_1)->save(public_path('images/').$name1);
                $msg =  '1 image doen and';
            }
            if($request->image_2){
                $name2 = time().'.'. explode('/', explode(':',substr($request->image_2,0,strpos($request->image_2,';')))[1])[1];
                Image::make($request->image_2)->save(public_path('images/').$name2);
                $msg .=  '2 image doen and';
            }

            // $iname = 'image_'.$i;
            // if($request->$iname){
            //     $name = time().'.'. explode('/', explode(':',substr($request->$iname,0,strpos($request->$iname,';')))[1])[1];
            //     Image::make($request->$iname)->save(public_path('images/').$name);

            //     $images[] = $iname;

            // }
           
            Product::create([
                'product_name' =>$validate['product_name'],
                'description' =>$validate['description'], 
                'catagory' =>$validate['catagory'], 
                'price' =>$validate['price'], 
                'quntity' =>$validate['quntity'], 
                'image_1' =>$name1
                
            ]);

            
      

        
        
        return ["success" =>$msg];
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
