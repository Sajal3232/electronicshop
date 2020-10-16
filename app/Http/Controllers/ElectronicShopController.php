<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ElectronicShopController extends Controller
{
    public function index(){
        // $categories=Category::where('publication_status', 1)->get();
        $newproducts=Product::where('publication_status', 1)
        ->orderby('id','DESC')
        ->take(8)
        ->get();
        return view('front-end.home.home',[
            // 'categories'=>$categories,
            'newproducts'=>$newproducts
            ]);
    }

    public function categoryproducts($id){
        $categoryproducts=Product::where('category_id',$id)
                                   ->where('publication_status', 1)
                                   ->get();
        return view('front-end.category.category-content',['categoryproducts'=>$categoryproducts]);
    }
    public function categoryproductsaccessories(){
        return view('front-end.category.category-accessories');
    }
    public function productdetails($id){
      $product=Product::find($id);
        return view('front-end.product.product-details',['product'=>$product]);
    }
    public function aboutus(){
        return view('front-end.category.aboutus');
    }
    public function mailus(){
        return view('front-end.category.mailus');
    }
    
    
}
