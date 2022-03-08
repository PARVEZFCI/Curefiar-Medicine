<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductSubSubCategory;
use Illuminate\Http\Request;
use App\Models\ProductCategory;   
use App\Http\Requests\Product\ProductSubSubcategoryRequest;
use Illuminate\Support\Str;
use App\Models\ProductSubCategory;
use Illuminate\Support\Facades\File;

class ProductSubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $data['categories'] = ProductCategory::where('status',1)->orderBy('id','DESC')->get();
         $data['subsubcategories'] = ProductSubSubCategory::with(['productCategories','productSubCategories'])->orderBy('id','DESC')->get();
        return view('product.sub-sub-category.index',$data);

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
    public function store(ProductSubSubcategoryRequest $request)
    {

        $productsubcategory = new ProductSubSubCategory;
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if($request->hasFile('image')){
            $extension = $request->image->getClientOriginalExtension();
            $imageName = "proSubCateImg".'_'.time().'.'.$extension;
            $request->image->storeAs('public/uploads/product/category',$imageName);
            $data['image'] = $imageName;
        }

        if($request->hasFile('sub_cate_banner')){
            $extension = $request->sub_cate_banner->getClientOriginalExtension();
            $imageName = "proSubCat".'_'.time().'.'.$extension;
            $request->sub_cate_banner->storeAs('public/uploads/product/category',$imageName);
            $data['banner'] = $imageName;
        }

        $productsubcategory->fill($data)->save();

        notify()->success("Product Sub Category Save successfully", "");
        return redirect()->route('product-sub-subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSubSubCategory  $productSubSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSubSubCategory $productSubSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSubSubCategory  $productSubSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['productSubSubCategory'] = ProductSubSubCategory::with(['productCategories','productSubCategories'])->findOrFail($id);
        $data['categories'] = ProductCategory::orderBy('id','DESC')->get();
        return view('product.sub-sub-category.edit',$data);
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductSubSubCategory  $productSubSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ProductSubSubcategoryRequest $request,$id)
    {

        $productSubSubCategory = ProductSubSubCategory::findOrFail($id);
        $data = $request->all();
        if($request->hasFile('sub_cate_banner')){
            if(File::exists($productSubSubCategory->banner)){

                unlink('storage/uploads/product/category/'.$productSubSubCategory->banner);
            }
            $extension = $request->sub_cate_banner->getClientOriginalExtension();
            $imageName = "proSubCat".'_'.time().'.'.$extension;
            $request->sub_cate_banner->storeAs('public/uploads/product/category',$imageName);
            $data['banner'] = $imageName;
        }
        if($request->hasFile('image')){
            if(File::exists($productSubSubCategory->image)){

                unlink('storage/uploads/product/category/'.$productSubSubCategory->image);
            }
            $extension = $request->image->getClientOriginalExtension();
            $imageName = "proSubCateImg".'_'.time().'.'.$extension;
            $request->image->storeAs('public/uploads/product/category',$imageName);
            $data['image'] = $imageName;
        }
        $productSubSubCategory->update($data);

        notify()->success("Product Sub Sub Category updated successfully", "");
        return redirect()->route('product-sub-subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSubSubCategory  $productSubSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = ProductSubSubCategory::findOrFail($id)->delete();
        
       // $productSubSubCategory->delete();
     
        if($productSubSubCategory->banner){

            unlink('storage/uploads/product/subsubcategory/'.$productSubSubCategory->banner);

        }


        notify()->success("Product Sub Sub Category deleted successfully", "");
        return redirect()->route('product-sub-subcategories.index');
    }



    public function changeStatus($id)
    {
        $subsubcategory = ProductSubSubCategory::findOrFail($id);
        if($subsubcategory->status == 0) {

            $subsubcategory->status = 1;
        } else {
            $subsubcategory->status = 0;
        }
        $subsubcategory->save();

        notify()->success("Product Sub Sub Category status changed successfully", "");
        return redirect()->route('product-sub-subcategories.index');
    }
}
