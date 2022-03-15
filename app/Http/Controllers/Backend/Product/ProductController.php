<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductRequest;
use App\Models\ProductCategory; 
use App\Models\ProductImage; 
use Illuminate\Support\Str;
use App\Helpers\Helper;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::with(['productCategories','productSubCategories','productSubSubCategories'])->orderBy('id','DESC')->get();
      
        return view('product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = ProductCategory::where('status',1)->orderBy('id','DESC')->get();

        return view('product.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $product = new Product;
        $product_image = new ProductImage;
        $data['slug'] = Str::slug($request->name).Str::random(5);
        $photos = [];
       

        if($request->hasFile('thumbnail')){
            $extension = $request->thumbnail->getClientOriginalExtension();
            $imageName = "product".'_'.time().'.'.$extension;
            $request->thumbnail->storeAs('public/uploads/product',$imageName);
            $data['thumbnail_image'] = $imageName;
        }

        $product->fill($data)->save();
        
        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
               
                
                $extension = $photo->getClientOriginalExtension();
                $name      = "photo".'_'.time().rand(). '.' .$extension;
                    $photo->storeAs('public/uploads/product/mainproduct', $name);
               
              
               
                ProductImage::create([
                    'product_id'=>$product->id,
                    'image' => $name,
                    'created_at' => now() // this could be in model events / observers
                ]);
                //$product_image->fill($dataimage)->save();
            }
           // $data['image'] = json_encode($photos);
        }
        
        notify()->success("Product Save successfully", "");
        return redirect()->route('products.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Product::with('productCategories','productSubCategories','productSubSubCategories')->with(['productImages' => function ($query) {
            $query->orderBy('id', 'ASC');  }])->findOrFail($id);
    
        $data['categories'] = ProductCategory::orderBy('id','DESC')->get();
        return view('product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();
       // $data['slug'] = (Str::slug($request->name).Str::random(5));
        if($request->hasFile('thumbnail')){

            // if($product->thumbnail_image){
            //     unlink('storage/uploads/product/'.$product->thumbnail_image);
            // }

            $extension = $request->thumbnail->getClientOriginalExtension();
            $imageName = "product".'_'.time().'.'.$extension;
            $request->thumbnail->storeAs('public/uploads/product',$imageName);
            $data['thumbnail_image'] = $imageName;
        }

        $product->update($data);
        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $extension = $photo->getClientOriginalExtension();
                $name      = "photo".'_'.time().rand(). '.' .$extension;
                $photo->storeAs('public/uploads/product/mainproduct', $name);
                ProductImage::create([
                    'product_id'=>$product->id,
                    'image' => $name,
                    'created_at' => now() // this could be in model events / observers
                ]);
                //$product_image->fill($dataimage)->save();
            }
           // $data['image'] = json_encode($photos);
        }

        notify()->success("Product Category updated successfully", "");
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->image){
            $image = json_decode($product->image);
            foreach($image as $row){
                unlink('storage/uploads/product/mainproduct/'.$row);
            }

        }
        if($product->thumbnail_image){
            unlink('storage/uploads/product/'.$product->thumbnail_image);
        }
      $product->delete();
    
        notify()->success("Product deleted successfully", "");
       return redirect()->route('products.index');
    }

    public function changeStatus($id)
    {
        $product = Product::findOrFail($id);
        if($product->status == 0) {

            $product->status = 1;
        } else {
            $product->status = 0;
        }
        $product->save();

        notify()->success("Product status changed successfully", "");
        return redirect()->route('products.index');
    }
}
