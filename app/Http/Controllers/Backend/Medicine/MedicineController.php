<?php

namespace App\Http\Controllers\Backend\Medicine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\MedicinePrice;
use App\Models\Category;
use App\Models\Manufacture;
use App\Models\Generic;
use App\Models\Unit;
use App\Helpers\Helper;
use App\Traits\ImageUpload; 
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Medicine\MedicineRequest;
use Illuminate\Support\Str;

class MedicineController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories   = Category::active()->get(['id', 'name']);
        $manufactures = Manufacture::active()->get(['id', 'manufacture_name']);
        $generics     = Generic::active()->get(['id', 'name']);
        $units        = Unit::active()->get(['id', 'unit_name']);
        $medicines    = Medicine::relation()->orderBy('medicine_name', 'ASC')->paginate(20);

        return view('medicine.index', compact('categories', 'manufactures', 'generics', 'units', 'medicines'));
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
    public function store(MedicineRequest $request)
    {   
        try {
            $medicine = new Medicine();
            $requestedData = $request->all();
        
            if($request->hasFile('image')){
                $extension = $request->image->getClientOriginalExtension();
                $imgName = "medi".'_'.time(). '.' .$extension;
                $isValidImage = Helper::ImageExtension($extension);
                if ($isValidImage == true) {
                   $request->image->storeAs('public/uploads/medicines', $imgName);
                   $requestedData['image'] = $imgName;
                 }
            }

            $medicine->fill($requestedData)->save();

            //For primary unit
            if($request->primary_unit) {
                MedicinePrice::create([
                    'medicine_id'    => $medicine->id,
                    'unit_id'        => $request->primary_unit,
                    'type'           => 'primary',
                    'price'          => $request->price,
                    'discount'       => $request->discount,
                    'discount_price' => $request->discount_price,
                ]);
            }

            //For secondary unit
            if($request->secondary_unit) {
                MedicinePrice::create([
                    'medicine_id'    => $medicine->id,
                    'unit_id'        => $request->secondary_unit,
                    'type'           => 'secondary',
                    'price'          => $request->price / $request->convertion_factor,
                    'discount'       => 0,
                    'discount_price' => $request->discount ? ( $request->discount_price / $request->convertion_factor ) : ( $request->price / $request->convertion_factor ),
                ]);
            }
            

            notify()->success("Medicine created successfully", "");
            return redirect()->route('medicines.index');

        } catch(\Exception $e) {
            return back();
            notify()->warning("Something went wrong");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * 
     *
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $categories   = Category::active()->get(['id', 'name']);
        $manufactures = Manufacture::active()->get(['id', 'manufacture_name']);
        $generics     = Generic::active()->get(['id', 'name']);
        $units        = Unit::active()->get(['id', 'unit_name']);
        $medicine     = Medicine::relation()->findOrFail($id);
        return view('medicine.edit', compact('medicine','categories', 'manufactures', 'generics', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {     
        try {
            $medicine = Medicine::findOrFail($id);
            $requestedData = $request->all();
           
            if($request->hasFile('image')){
                $extension = $request->image->getClientOriginalExtension();
                $imgName = "medi".'_'.time(). '.' .$extension;
                $isValidImage = Helper::ImageExtension($extension);
                if ($isValidImage == true) {
                   $request->image->storeAs('public/uploads/medicines', $imgName);
                   $requestedData['image'] = $imgName;
                 }
            }

            $medicine->fill($requestedData)->save();

            //For primary unit
            if($request->primary_unit) {
                MedicinePrice::updateOrCreate(
                    [ 'medicine_id' => $id, 'type' => 'primary'],
                    [
                        'unit_id'        => $request->primary_unit,
                        'price'          => $request->price,
                        'discount'       => $request->discount,
                        'discount_price' => $request->discount_price,
                    ]
                );
            }

            //For secondary unit
            if($request->secondary_unit) {
                MedicinePrice::updateOrCreate(
                    [ 'medicine_id' => $id, 'type' => 'secondary'],
                    [
                        'unit_id'        => $request->secondary_unit,
                        'price'          => $request->price / $request->convertion_factor,
                        'discount'       => null,
                        'discount_price' => $request->discount_price ? $request->discount_price / $request->convertion_factor : null,
                    ]
                );
            }

            notify()->success("Medicine updated successfully", "");
            return redirect()->route('medicines.index');

        } catch(\Exception $e) {
            return back();
            notify()->warning("Something went wrong");
        }      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {

        Storage::delete('/public/uploads/medicines/' .$medicine->image);
        $medicine->delete();

        notify()->success("Medicine deleted successfully", "");
        return redirect()->route('medicines.index');
    }

    /**
     * Change the medicine status
     *
     * @param  \App\Models\Medicine
     * @return \Illuminate\Http\Response
    */

    public function changeStatus($id)
    {
        $medicine = Medicine::findOrFail($id);
        if($medicine->status == 0) {
            $medicine->status = 1;
        } else {
            $medicine->status = 0;
        }
        $medicine->save();

        notify()->success("Medicine status changed successfully", "");
        return redirect()->route('medicines.index');
    }

    // public function createOrUpdate($property, $request)
    // {   
    //     $medicine = new Medicine();
    //     $requestedData = $request->all();

    //     if($request->hasFile('image')){
    //         $extension = $request->image->getClientOriginalExtension();
    //         $imgName = "medi".'_'.time(). '.' .$extension;
    //         $isValidImage = Helper::ImageExtension($extension);
    //         if ($isValidImage == true) {
    //            $request->image->storeAs('public/uploads/medicines', $imgName);
    //            $requestedData['image'] = $imgName;
    //          }
    //     }

    //     $medicine->fill($requestedData)->save();

    //     //For primary unit
    //     if($request->primary_unit) {
    //         MedicinePrice::create([
    //             'medicine_id'    => $medicine->id,
    //             'unit_id'        => $request->primary_unit,
    //             'type'           => 'primary',
    //             'price'          => $request->price,
    //             'discount'       => $request->discount,
    //             'discount_price' => $request->discount_price,
    //         ]);
    //     }

    //     //For secondary unit
    //     if($request->secondary_unit) {
    //         MedicinePrice::create([
    //             'medicine_id'    => $medicine->id,
    //             'unit_id'        => $request->secondary_unit,
    //             'type'           => 'secondary',
    //             'price'          => $request->price / $request->convertion_factor,
    //             'discount'       => 0,
    //             'discount_price' => $request->discount ? ( $request->discount_price / $request->convertion_factor ) : ( $request->price / $request->convertion_factor ),
    //         ]);
    //     }
    // }
}
