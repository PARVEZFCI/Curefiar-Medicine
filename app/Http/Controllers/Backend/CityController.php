<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::latest()->get();
        return view('city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $city = new City();
        $city->fill($request->all())->save();
        notify()->success("City save successfully", "");
        return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);
        return response()->json($city, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $city = City::findOrFail($id);
        $city->fill($request->all())->save();

        notify()->success("City updated successfully", "");
        return response()->json('success', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id)->delete();

        notify()->success("City deleted successfully", "");
        return redirect()->route('cities.index');
    }

    public function changeStatus($id)
    {
        $city = City::findOrFail($id);
        if($city->status == 0) {

            $city->status = 1;
        } else {
            $city->status = 0;
        }
        $city->save();
        notify()->success("City status changed successfully", "");
        return redirect()->route('cities.index');
    }
}
