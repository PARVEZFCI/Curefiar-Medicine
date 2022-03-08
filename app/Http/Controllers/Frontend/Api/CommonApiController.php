<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Area;

class CommonApiController extends Controller
{
    public function getCity() {
        return response()->json(City::active()->get(['id','city_name']), 200);
    }

    public function getArea($city) {
        $area = Area::where('city_id', $city)->active()->get(['id', 'area_name']);
        return response()->json($area, 200);
    }
}
