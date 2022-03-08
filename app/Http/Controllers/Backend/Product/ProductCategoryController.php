<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductCategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['count'] = ProductCategory::count();
        $data['productcategoeirs'] = ProductCategory::orderBy('id','DESC')->get();
        
        return view('product.category.index',$data);
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
    public function store(ProductCategoryRequest $request)
    {
        $productcategory = new ProductCategory;
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);


        if($request->hasFile('cate_banner')){
            $extension = $request->cate_banner->getClientOriginalExtension();
            $imageName = "proCat".'_'.time().'.'.$extension;
            $request->cate_banner->storeAs('public/uploads/product/category',$imageName);
            $data['banner'] = $imageName;
        }

        if($request->hasFile('cate_icon')){
            $extension = $request->cate_icon->getClientOriginalExtension();
            $imageName = "proCaticon".'_'.time().'.'.$extension;
            $request->cate_icon->storeAs('public/uploads/product/category',$imageName);
            $data['icon'] = $imageName;
        }

        if($request->hasFile('image')){
            $extension = $request->image->getClientOriginalExtension();
            $imageName = "proCateImg".'_'.time().'.'.$extension;
            $request->cate_icon->storeAs('public/uploads/product/category',$imageName);
            $data['image'] = $imageName;
        }

        $productcategory->fill($data)->save();

        notify()->success("Product Category Save successfully", "");
        return redirect()->route('product-categories.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */

    public function edit(ProductCategory $productCategory)
    {
 
        return view('product.category.edit',compact("productCategory"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $data = $request->all();

        if($request->hasFile('cate_banner')){
          
            if(File::exists($productCategory->banner)){

                unlink('storage/uploads/product/category/'.$productCategory->banner);
            }
            $extension = $request->cate_banner->getClientOriginalExtension();
            $imageName = "proCat".'_'.time().'.'.$extension;
            $request->cate_banner->storeAs('public/uploads/product/category',$imageName);
            $data['banner'] = $imageName;
        }

        if($request->hasFile('cate_icon')){

            if(File::exists($productCategory->icon)){

                unlink('storage/uploads/product/category/'.$productCategory->icon);
            }
            $extension = $request->cate_icon->getClientOriginalExtension();
            $imageName = "proCaticon".'_'.time().'.'.$extension;
            $request->cate_icon->storeAs('public/uploads/product/category',$imageName);
            $data['icon'] = $imageName;
        }

        if($request->hasFile('image')){

            if(File::exists($productCategory->image)){

                unlink('storage/uploads/product/category/'.$productCategory->image);
            }
            $extension = $request->image->getClientOriginalExtension();
            $imageName = "proCateImg".'_'.time().'.'.$extension;
            $request->image->storeAs('public/uploads/product/category',$imageName);
            $data['image'] = $imageName;
        }

        $productCategory->update($data);

        notify()->success("Product Category updated successfully", "");
        return redirect()->route('product-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {

        if(File::exists($productCategory->banner)) {

            unlink('storage/uploads/product/category/'.$productCategory->banner);

        }

        if(File::exists($productCategory->icon)) {

            unlink('storage/uploads/product/category/'.$productCategory->icon);

        }

        if(File::exists($productCategory->image)) {

            unlink('storage/uploads/product/category/'.$productCategory->image);

        }

        $productCategory->delete();

        notify()->success("Product Category deleted successfully", "");
        return redirect()->route('product-categories.index');
    }

    public function changeStatus($id)
    {
        $subcategory = ProductCategory::findOrFail($id);
        if($subcategory->status == 0) {

            $subcategory->status = 1;
        } else {
            $subcategory->status = 0;
        }
        $subcategory->save();
        notify()->success("Product Sub Category status changed successfully", "");
        return redirect()->route('product-categories.index');
    }
}
