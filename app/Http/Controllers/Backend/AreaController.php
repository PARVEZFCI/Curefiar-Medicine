<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::active()->orderBy('city_name', 'ASC')->get();
        $areas = Area::with('city')->latest()->get();
        return view('area.index', compact('areas', 'cities'));
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
    public function store(AreaRequest $request)
    {
        $area = new Area();
        $area->city_id = $request->city;
        $area->area_name = $request->area_name;
        $area->save();
        notify()->success("Area save successfully", "");
        return redirect()->route('areas.index');
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
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('area.edit', compact('area'));
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
        $area = Area::findOrFail($id);
        $area->city_id = $request->city;
        $area->area_name = $request->area_name;
        $area->save();

        notify()->success("Area updated successfully", "");
        return redirect()->route('areas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::findOrFail($id)->delete();

        notify()->success("Area deleted successfully", "");
        return redirect()->route('areas.index');
    }

    public function changeStatus($id)
    {
        $area = Area::findOrFail($id);
        if($area->status == 0) {

            $area->status = 1;
        } else {
            $area->status = 0;
        }
        $area->save();
        notify()->success("Area status changed successfully", "");
        return redirect()->route('areas.index');
    }
}
