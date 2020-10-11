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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home',[
    'uses'=>'App\Http\Controllers\HomeController@index',
    'as'=>'/'
]);
Route::get('/category/add',[
    'uses'=>'App\Http\Controllers\CategoryController@addcategoryinfo',
    'as'=>'add-category'
]);
Route::post('/category/new-category',[
    'uses'=>'App\Http\Controllers\CategoryController@savecategoryinfo',
    'as'=>'new-category'
]);
Route::get('/category/manage',[
    'uses'=>'App\Http\Controllers\CategoryController@manage',
    'as'=>'manage-category'
]);
Route::get('/category/unpublished/{id}',[
    'uses'=>'App\Http\Controllers\CategoryController@unpublishedinfo',
    'as'=>'category/unpublished'
]);
Route::get('/category/published/{id}',[
    'uses'=>'App\Http\Controllers\CategoryController@publishedinfo',
    'as'=>'category/published'
]);
Route::get('/category/edit/{id}',[
    'uses'=>'App\Http\Controllers\CategoryController@editcategoryinfo',
    'as'=>'category/edit'
]);
Route::post('/category/update',[
    'uses'=>'App\Http\Controllers\CategoryController@updatecategoryinfo',
    'as'=>'category/update'
]);
Route::get('/category/delete/{id}',[
    'uses'=>'App\Http\Controllers\CategoryController@deletecategoryinfo',
    'as'=>'category/delete'
]);


