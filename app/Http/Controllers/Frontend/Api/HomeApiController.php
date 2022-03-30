<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MediaSetting;
use App\Models\ProductCategory; 
use App\Models\Product;
use App\Models\Medicine;
use App\Models\ProductOffer;


class HomeApiController extends Controller
{
   public function index(){
    
    $data['medicines'] =Medicine::orderBy('id','DESC')->active()->relation()->take(10)->get();
   
    // $data['categories'] = ProductCategory::with(['products' => function($q) {
    //     $q->limit(2)->get();
    // }])
    // ->limit(3)->get();
    $data['offers'] = ProductOffer::latest()->limit(3)->get();
   // dd($data['offers']);
    $data['categories'] = ProductCategory::with('products') ->get() ->map(function ($query) { $query->setRelation('products', $query->products->sortBy('id')->take(5)); return $query; });
    return view('frontend.index',$data);
   
   }
}
