<?php

namespace App\Http\Controllers\Backend\Medicine;

use App\Http\Controllers\Controller;
use App\Models\Manufacture;
use App\Http\Requests\Medicine\ManufactureRequest;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufactures = Manufacture::latest()->get();
        return view('medicine.manufacture.index', compact('manufactures'));
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
    public function store(ManufactureRequest $request)
    {   
        $manufacture = new Manufacture();
        $manufacture->fill($request->all())->save();

        notify()->success("Manufacture created successfully", "");
        return redirect()->route('manufactures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacture $manufacture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacture $manufacture)
    {
        return response()->json($manufacture, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function update(ManufactureRequest $request, Manufacture $manufacture)
    {   
        $manufacture->update($request->all());

        notify()->success("Manufacture updated successfully", "");
        return response()->json('success', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacture $manufacture)
    {
        $manufacture->delete();
    
        notify()->success("Manufacture deleted successfully", "");
        return redirect()->route('manufactures.index');
    }
}
