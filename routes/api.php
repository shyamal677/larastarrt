<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/catagory', 'API\CatagoryController'); //->middleware('role:normal admin');
Route::apiResource('/ourproduct', 'API\ProductController');
Route::apiResource('/hiredproduct', 'API\HiredProductController');

Route::get('/showItems/{id}','API\ProductController@show_items');
