<?php

namespace App\Http\Controllers\Backend\Medicine;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Medicine\CategoryStoreRequest;
use App\Http\Requests\Medicine\CategoryUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories = Category::latest()->get();
        return view('medicine.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {   
        
        $request_data = $request->all();
        $request_data['slug'] = Str::slug($request->name);
        Category::create($request_data);

        notify()->success("Category created successfully", "");
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryStoreRequest $request, Category $category)
    {   
        $category->update($request->all());

        notify()->success("Category updated successfully", "");
        return response()->json('success', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
    
        notify()->success("Category deleted successfully", "");
        return redirect()->route('categories.index');
    }

    /**
     * Change the category status
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
    */

    public function changeStatus($id)
    {
        $category = Category::findOrFail($id);
        if($category->status == 0) {
            $category->status = 1;
        } else {
            $category->status = 0;
        }
        $category->save();

        notify()->success("Category status changed successfully", "");
        return redirect()->route('categories.index');
    }

}
