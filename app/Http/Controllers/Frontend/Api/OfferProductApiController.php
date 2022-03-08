<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductOffer;
use App\Http\Resources\OfferResource;
use App\Models\OfferProducts;

class OfferProductApiController extends Controller
{   
    public function offerProduct()
    {
        // $offerProducts = OfferResource::collection(ProductOffer::offerRelation()->get());
        $offerProducts = OfferProducts::with('product')->get();
        return response()->json($offerProducts, 200);
    }
}
