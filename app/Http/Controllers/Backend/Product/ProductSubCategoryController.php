<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use App\Models\ProductCategory;   
use App\Http\Requests\Product\ProductSubCategoryRequest;   
use App\Models\ProductSubSubCategory;   
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 

class ProductSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = ProductCategory::orderBy('id','DESC')->where('status',1)->get();
        $data['countsubsub'] = ProductSubSubCategory::count();
        $data['subcategories'] = ProductSubCategory::with(['productcategories'])->orderBy('id','DESC')->get();
        return view('product.sub-category.index',$data);
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
    public function store(ProductSubCategoryRequest $request)
    {
        $productsubcategory = new ProductSubCategory;
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if($request->hasFile('sub_cate_banner')){
            $extension = $request->sub_cate_banner->getClientOriginalExtension();
            $imageName = "proSubCate".'_'.time().'.'.$extension;
            $request->sub_cate_banner->storeAs('public/uploads/product/category',$imageName);
            $data['banner'] = $imageName;
        }


        if($request->hasFile('sub_cate_image')){
            $extension = $request->sub_cate_image->getClientOriginalExtension();
            $imageName = "proSubCatimg".'_'.time().'.'.$extension;
            $request->sub_cate_image->storeAs('public/uploads/product/category',$imageName);
            $data['image'] = $imageName;
        }

        $productsubcategory->fill($data)->save();
        notify()->success("Product Sub Category Save successfully", "");
        return redirect()->route('product-sub-categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSubCategory $productSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSubCategory $productSubCategory)
    {
        return view('product.sub-category.edit',compact('productSubCategory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSubCategory $productSubCategory)
    {
        $data = $request->all();

        if($request->hasFile('sub_cate_banner')){
          
            if(File::exists($productSubCategory->banner)){

                unlink('storage/uploads/product/category/'.$productSubCategory->banner);
            }
            $extension = $request->sub_cate_banner->getClientOriginalExtension();
            $imageName = "proSubCat".'_'.time().'.'.$extension;
            $request->sub_cate_banner->storeAs('public/uploads/product/category',$imageName);
            $data['banner'] = $imageName;
        }


        if($request->hasFile('sub_cate_image')){

            if(File::exists($productSubCategory->image)){

                unlink('storage/uploads/product/category/'.$productSubCategory->image);
            }
            $extension = $request->sub_cate_image->getClientOriginalExtension();
            $imageName = "proSubCatimg".'_'.time().'.'.$extension;
            $request->sub_cate_image->storeAs('public/uploads/product/category',$imageName);
            $data['image'] = $imageName;
        }


        $productSubCategory->update($data);

        notify()->success("Product Sub Category updated successfully", "");
        return redirect()->route('product-sub-categories.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSubCategory $productSubCategory)
    {
       

        if(File::exists($productSubCategory->banner)){

            unlink('storage/uploads/product/subcategory/'.$productSubCategory->banner);

        }
        if(File::exists($productSubCategory->image)){

            unlink('storage/uploads/product/subcategory/'.$productSubCategory->image);

        }

        $productSubCategory->delete();
    
        notify()->success("Product Sub Category deleted successfully", "");
        return redirect()->route('product-sub-categories.index');
    }

    public function changeStatus($id)
    {
        $subcategory = ProductSubCategory::findOrFail($id);
        if($subcategory->status == 0) {

            $subcategory->status = 1;
        } else {
            $subcategory->status = 0;
        }
        $subcategory->save();
        notify()->success("Product Sub Category status changed successfully", "");
        return redirect()->route('product-sub-categories.index');
    }
}
