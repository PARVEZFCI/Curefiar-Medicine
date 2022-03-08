<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory; 
use App\Models\Product;
use App\Models\Medicine;

class FrontendCategoryController extends Controller
{
    
    public function categorywiseproduct($slug){
     
       $data['categories'] = $categories = ProductCategory::where('slug',$slug)->first();
      //  $data['category'] = $category = ProductCategory::select()->where('slug',$slug)->with(['products' => function($q) {
      //       $q->paginate(2);
      //   }])
      //   ->first();
        $data['products'] = Product::where('category_id',$categories->id)->orderBy('id','DESC')->paginate(20);
        return view('frontend.categorywiseproduct',$data);
    }

    public function allmedicine(){
         
      $data['medicines'] = Medicine::active()->relation()->paginate(50);
      return view('frontend.allmedicine',$data);
    }

    public function singleproduct($slug){

      $data['product'] = Product::where('slug',$slug)->first();

      return view('frontend.singleproduct',$data);
    }
}
