<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = "product_categories";
    protected $fillable = [
        'name', 'slug', 'status', 'icon', 'image', 'banner','created_by', 'updated_by'
    ];
    
    public function scopeActive($q) 
    {
        return $q->where('status', 1);
    }

    public function subCategories()
    {
        return $this->hasMany(ProductSubCategory::class, 'category_id', 'id');
    }

    public function subSubCategories()
    {
        return $this->hasMany(ProductSubSubCategory::class, 'category_id', 'id');
    }
    
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product_category) {
            $product_category->slug = Str::slug($product_category->name);
            // $product_category->created_by = Auth::user()->id;
        });

        static::updating(function ($product_category) {
            $product_category->slug = Str::slug($product_category->name);
            // $product_category->updated_by = Auth::user()->id;
        });
    }
}

