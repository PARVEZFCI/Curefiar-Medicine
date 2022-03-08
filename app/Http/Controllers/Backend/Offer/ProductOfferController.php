<?php

namespace App\Http\Controllers\Backend\Offer;

use App\Http\Controllers\Controller;
use App\Models\ProductOffer;
use Illuminate\Http\Request;  
use App\Http\Requests\Offer\OfferRequest;
use App\Models\Product;
use App\Models\OfferProducts;


class ProductOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product'] = Product::orderBy('id','DESC')->get();
        $data['productoffers'] = ProductOffer::orderBy('id','DESC')->get();
        return view('offer.index',$data);
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
    public function store(OfferRequest $request)
    {
        $productoffer = new ProductOffer;
        $offerProducts = new OfferProducts;
        $data = $request->all();
       

       if($request->hasFile('offer_img')){
            $extension = $request->offer_img->getClientOriginalExtension();
            $imageName = "product".'_'.time().'.'.$extension;
            $request->offer_img->storeAs('public/uploads/offer',$imageName);
            $data['image'] = $imageName;
        }
        $productoffer->fill($data)->save();
    

        foreach($request->id as $key=> $row){
            $product_id[] = $row;
            Product::updateOrCreate(
                ['id' => $row],
                [
                    'price'=>$request->price[$key],
                    'discount' => $request->discount[$key],
                    'discount_price' => $request->discount_price[$key] 
                ]
            );

            OfferProducts::create([
                'product_id' =>$row,
                'offer_id'   =>$productoffer->id
            ]);
        }

    notify()->success("Product Offer Save successfully", "");
        return redirect()->route('offers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductOffer  $productOffer
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOffer $productOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductOffer  $productOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOffer $productOffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductOffer  $productOffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductOffer $productOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductOffer  $productOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $productOffer = ProductOffer::findOrFail($id);
   
        if($productOffer->image){
            unlink('storage/uploads/offer/'.$productOffer->image);
        }
        $productOffer->delete();
        notify()->success("Product Offer Delete successfully", "");
        return redirect()->route('offers.index');

    }

    public function changeStatus($id)
    {
        $productoffer = ProductOffer::findOrFail($id);
        if($productoffer->status == 0) {

            $productoffer->status = 1;
        } else {
            $productoffer->status = 0;
        }
        $productoffer->save();
        notify()->success("Product Offer status changed successfully", "");
        return redirect()->route('offers.index');
    }
}
