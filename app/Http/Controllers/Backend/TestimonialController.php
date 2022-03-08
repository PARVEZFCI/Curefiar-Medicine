<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientReviews = Testimonial::latest()->get();
        return view('testimonial.index', compact('clientReviews'));
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
    public function store(Request $request)
    {     
        $review = new Testimonial();
        $data = $request->all();
        if($request->hasFile('image')){
            $extension = $request->image->getClientOriginalExtension();
            $imageName = "client".'_'.time().'.'.$extension;
            $request->image->storeAs('public/uploads/client',$imageName);
            $data['image'] = $imageName;
        }

        $review->fill($data)->save();
        notify()->success("client comment add successfully", "");
        return redirect()->route('testimonials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
    
        notify()->success("Testimonial deleted successfully", "");
        return redirect()->route('testimonials.index');
    }

    public function changeStatus($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if($testimonial->status == 0) {
            $testimonial->status = 1;
        } else {
            $testimonial->status = 0;
        }
        $testimonial->save();

        notify()->success("Testimonial status changed successfully", "");
        return redirect()->route('testimonials.index');
    }
}
