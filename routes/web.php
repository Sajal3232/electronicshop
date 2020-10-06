<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[
    'uses'=>'App\Http\Controllers\ElectronicShopController@index',
    'as'=>'/'
]);
Route::get('/category/mobails',[
    'uses'=>'App\Http\Controllers\ElectronicShopController@categoryproducts',
    'as'=>'category-products'
]);
Route::get('/category/accessories',[
    'uses'=>'App\Http\Controllers\ElectronicShopController@categoryproductsaccessories',
    'as'=>'category-products-accessories'
]);
Route::get('/category/aboutus',[
    'uses'=>'App\Http\Controllers\ElectronicShopController@aboutus',
    'as'=>'about-us'
]);
Route::get('/category/mailus',[
    'uses'=>'App\Http\Controllers\ElectronicShopController@mailus',
    'as'=>'mail-us'
]);


