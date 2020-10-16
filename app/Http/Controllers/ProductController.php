<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Image;
use DB;

class ProductController extends Controller
{
    public function index(){
        $categories=Category::where('publication_status', 1)->get();
        $brands=Brand::where('publication_status', 1)->get();

        return view('admin.product.add-product',[
            'categories'=>$categories,
            'brands'=>$brands
            ]);
    }

    protected function productValidateInfo($request){
        $this->validate($request,[
            'category_id'=>'required',
             'brand_id'=>'required',
            'product_name'=>'required',
            'product_price'=>'required',
            'product_quantity'=>'required',
            'short_description'=>'required',
            'product_image'=>'required',
            'publication_status'=>'required',

        ]); 
    }

    protected function productimageinfo($request){
        $productimage=$request->file('product_image');
        $filetype=$productimage->getClientOriginalExtension();
        $imagename=$request->product_name.'.'.$filetype;
        $directory='product-images/';
        //$productimage->move($directory,$imagename);    
        $imageurl=$directory.$imagename;
        // using intervention packege
        Image::make($productimage)->save($imageurl);
        return $imageurl;
            // other methode save image
           // $productimage=$request->file('product_image');
        // $imagename=$productimage->getClientOriginalName();
        // $imagedirectory='product-images/';
        // $imageurl=$imagedirectory.$imagename;
        // $productimage->move($imagedirectory,$imagename);

    }

    protected function saveProductBasicInfo($request,$imageurl){
        $products=new Product();

        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->product_name = $request->product_name;
        $products->product_price = $request->product_price;
        $products->product_quantity = $request->product_quantity;
        $products->short_description = $request->short_description;
        $products->long_description = $request->long_description;
        $products->product_image= $imageurl; 
        $products->publication_status = $request->publication_status;
        $products->save();
    }

    public function saveproductinfo(Request $request){
            
        $this->productValidateInfo($request);
        $imageurl=$this->productimageinfo($request);
        $this->saveProductBasicInfo($request,$imageurl);

     return redirect('/product/add')->with('message','product info add successfully');
    }

    public function manageproductinfo(){
       $products= DB::table('products')
       ->join('categories', 'products.category_id', '=', 'categories.id')
       ->join('brands','products.brand_id','=', 'brands.id')
       ->select('products.*','categories.category_name','brands.brand_name')
       ->get();

        return view('admin.product.manage-product',['products'=>$products]);
    }
}
