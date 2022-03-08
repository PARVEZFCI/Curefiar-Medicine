<?php

namespace App\Http\Controllers\Backend\Medicine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Generic;
use App\Http\Requests\Medicine\GenericStoreRequest;


class GenericController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['generic'] = Generic::all();
      
        return view('medicine.generic.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
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
     * 
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|string|unique:generics,name,'
            
        ]);
        $data = $request->all();
        $generic = new Generic;

        $generic->fill($data)->save();

        notify()->success("Generic created successfully", "");
        return redirect()->route('generics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function edit(Generic $generic)
    {
        return response()->json($generic, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenericStoreRequest $request, Generic $generic)
    {
        $generic->update($request->all());

        notify()->success("Generic updated successfully", "");
        return response()->json('success', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Generic $generic)
    {
        $generic->delete();
    
        notify()->success("Generic deleted successfully", "");
        return redirect()->route('generics.index');
    }

    public function changeStatus($id)
    {
        $generic = Generic::findOrFail($id);
        if($generic->status == 0) {

            $generic->status = 1;

        } else {

            $generic->status = 0;
        }
        $generic->save();

        notify()->success("Generic status changed successfully", "");
        return redirect()->route('generics.index');
    }
}
