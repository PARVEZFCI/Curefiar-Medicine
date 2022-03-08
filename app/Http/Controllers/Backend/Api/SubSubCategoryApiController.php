<?php

namespace App\Http\Controllers\Backend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;  
use App\Models\ProductSubCategory;



class SubSubCategoryApiController extends Controller
{
    public function forSubCat(Request $request){
        $data = ProductSubCategory::where('category_id',$request->id)->where('status',1)->get();
        return response()->json($data); 
    }

   
}
