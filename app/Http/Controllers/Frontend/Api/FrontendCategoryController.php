<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory; 
use App\Models\Product;
use App\Models\Medicine;
use App\Models\Category;

class FrontendCategoryController extends Controller
{
    
    public function categorywiseproduct($slug){
     
       $data['categories'] = $categories = ProductCategory::where('slug',$slug)->first();
      //  $data['category'] = $category = ProductCategory::select()->where('slug',$slug)->with(['products' => function($q) {
      //       $q->paginate(2);
      //   }])
      //   ->first();
      $data['pro_categories'] = ProductCategory::latest()->get();
       
        $data['products'] = Product::where('category_id',$categories->id)->orderBy('id','DESC')->paginate(20);
        return view('frontend.categorywiseproduct',$data);
    }

    public function allmedicine(){
         
      $data['medicines'] = Medicine::active()->relation()->paginate(50);
        // dd( $data['medicines']);
        $data['medicine_categories'] = Category::latest()->get();
      return view('frontend.allmedicine',$data);
    }

    public function singleproduct($slug){
  
      try{

      $data['productsingle'] = $product = Product::where('slug',$slug)->first();
      $data['medicinesingle'] =  Medicine::where('slug',$slug)->relation()->first();
      if($product){
      $data['products'] = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(6)->get();
      return view('frontend.singleproduct',$data);

      }else{

        $data['medicines'] = Medicine::inRandomOrder()->active()->relation()->limit(6)->get();
        //dd($data['medicinesingle']);
        return view('frontend.singlemedicine',$data); 
      }


      }catch(\Exception $e){
        
        abort(404);
      }

    }

    public function srcmedicine(Request $request){
      try{

      $data['medicines'] =  Medicine::Search($request->search)->relation()->get();
       return view('frontend.searchmedicine',$data);
      }catch(\Exception $e){
        
        abort(404);
      }

    }

    public function medicinecat($slug){
     
      $cat_id = Category::where('slug',$slug)->first();
     
      $data['medicines'] = Medicine::where('category_id',$cat_id->id)->active()->relation()->paginate(30);

      $data['medicine_categories'] = Category::latest()->get();

      return view('frontend.allmedicine',$data);
 
    }
}
