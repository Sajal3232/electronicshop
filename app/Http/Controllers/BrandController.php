<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function addbrandinfo(){
        return view('admin.brand.add-brand');
    }

    public function savebrandinfo(Request $request){
            $this->validate($request,[
            'brand_name'=>'required|regex:/^[\pL\s\-]+$/u|max:15|min:2',
            'brand_description'=>'required',
            'publication_status'=>'required'
            
            ]);

            $brands=new Brand();
           $brands->brand_name = $request->brand_name;
           $brands->brand_description = $request->brand_description;
           $brands->publication_status = $request->publication_status;
           $brands->save();
      return redirect('/brand/add')->with('message', 'save brand info successfully');
    }
}

