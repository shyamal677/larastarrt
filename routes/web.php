<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/product','ProductController');

Route::get('/showItems/{id}','ProductController@show_items');

Route::resource('/cart','CartController');
//Route::post('/cart/set/{id}','CartController@update');
Route::get('/cart/remove/{id}','CartController@remove');

// Route::get('/{any}', function () {
//     return view('vendor\multiauth.admin.home'); 
// })->where('any', '.*');
