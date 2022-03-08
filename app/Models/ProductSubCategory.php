<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductSubCategory extends Model
{
    use HasFactory;

    protected $table = "product_sub_categories";
    protected $fillable = [
        'name','category_id','slug', 'status', 'image','banner','created_by', 'updated_by'
    ];

    public function productcategories()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function subsubCategories() 
    {
        return $this->hasMany(ProductSubSubCategory::class, 'sub_category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_category_id', 'id');
    }    
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product_sub_category) {
            $product_sub_category->slug = Str::slug($product_sub_category->name);
            // $product_sub_category->created_by = Auth::user()->id;
        });

        static::updating(function ($product_sub_category) {
            $product_sub_category->slug = Str::slug($product_sub_category->name);
            // $product_sub_category->updated_by = Auth::user()->id;
        });
    }
    
}
