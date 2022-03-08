<?php

namespace App\Http\Controllers\Backend\Medicine;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Http\Requests\Medicine\UnitRequest;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::latest()->get();
        return view('medicine.unit.index', compact('units'));
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
    public function store(UnitRequest $request)
    {
        $unit = new unit();
        $unit->fill($request->all())->save();

        notify()->success("Unit created successfully", "");
        return redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
         return response()->json($unit, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRequest $request, Unit $unit)
    {
        $unit->update($request->all());

        notify()->success("Unit updated successfully", "");
        return response()->json('success', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
    
        notify()->success("Unit deleted successfully", "");
        return redirect()->route('units.index');
    }

    /**
     * Change the unit status
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
    */

    public function changeStatus($id)
    {
        $unit = unit::findOrFail($id);
        if($unit->status == 0) {
            $unit->status = 1;
        } else {
            $unit->status = 0;
        }
        $unit->save();

        notify()->success("Unit status changed successfully", "");
        return redirect()->route('units.index');
    }
}
