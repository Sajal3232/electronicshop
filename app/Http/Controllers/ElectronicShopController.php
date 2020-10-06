<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElectronicShopController extends Controller
{
    public function index(){
        return view('front-end.home.home');
    }

    public function categoryproducts(){
        return view('front-end.category.category-mobails');
    }
    public function categoryproductsaccessories(){
        return view('front-end.category.category-accessories');
    }
    public function aboutus(){
        return view('front-end.category.aboutus');
    }
    public function mailus(){
        return view('front-end.category.mailus');
    }
    
    
}
