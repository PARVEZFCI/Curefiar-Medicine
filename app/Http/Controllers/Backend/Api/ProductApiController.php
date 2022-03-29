<?php

namespace App\Http\Controllers\Backend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSubSubCategory;
use App\Models\ProductImage;
use App\Models\Product;


class ProductApiController extends Controller
{
    public function forProSubSubCat(Request $request){

    $data = ProductSubSubCategory::where('sub_category_id',$request->id)->where('status',1)->get();


    return response()->json($data);


    }

    public function deleteImage($id){

        $product_image = ProductImage::findOrFail($id);
        
      //   if($product_image->image){

      //      unlink('storage/uploads/product/mainproduct/'.$product_image->image);
      //   }
        $product_image->delete();
        return back();

   }

   public function productSrc(Request $request){
      
   $product_data = Product::findOrFail($request->id);

   return json_encode($product_data);

   }
}
