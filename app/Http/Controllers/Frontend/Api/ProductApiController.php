<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SubCategoryResource;
use App\Http\Resources\SubSubCategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\MedicineResource;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\ProductSubSubCategory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Medicine;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Get product category.
     * 
     * @return \Illuminate\Http\Response
    */

    public function productCategory()
    {
        $categories = CategoryResource::collection(ProductCategory::with(['subCategories' => function($q) {
            $q->where('status', 1)->with(['subsubCategories' => function($q) {
                $q->where('status', 1);
            }]);
        }])->active()->get());
        return response()->json($categories, 200);
    }

    /**
     * Get category wise subcategory or product.
     * 
     * @return \Illuminate\Http\Response
    */

    public function categoryWiseSubCateOrProduct($slug)
    {   
        $categories = CategoryResource::collection(ProductCategory::with(['subCategories' => function($q) {
            $q->with('subsubCategories');
        }])
        ->where('slug', $slug)
        ->get());
        return response()->json($categories, 200);
    }

    /**
     * Get subcategory wise subsubcategory or product.
     * 
     * @return \Illuminate\Http\Response
    */

    public function subCategoryWiseSubSubCateOrProduct($slug)
    {   
        $subCategories = SubCategoryResource::collection(ProductSubCategory::with('subsubCategories', 'products')
        ->where('slug', $slug)
        ->get());
        return response()->json($subCategories, 200);
    }

    /**
     * Get subcategory wise subsubcategory or product.
     * 
     * @return \Illuminate\Http\Response
    */

    public function subSubCategoryWiseProduct($slug)
    {   
        $subCategories = SubSubCategoryResource::collection(ProductSubSubCategory::with(['products' => function($product) {
            $product->with('productImages');
        }])
        ->where('slug', $slug)
        ->get());
        return response()->json($subCategories, 200);
    }

     /**
     * Get all medicine.
     * 
     * @return \Illuminate\Http\Response
    */

    public function getMedicine(Request $request)
    {   
        $medicines = Medicine::active()->relation()->paginate(50);
        return MedicineResource::collection($medicines, 200);
    }

    /**
     * Search wise get all other product .
     * 
     * @return \Illuminate\Http\Response
    */

    public function searchProduct($query)
    {    
        if($query) {
            $product = Product::where('name', 'LIKE', '%' . $query . '%')->get(); 
            return response()->json($product, 200); 
        } else {
            return false;
        }
    }
    
}
