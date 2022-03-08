<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $fillable = [
        'category_id','sub_category_id','sub_sub_category_id','name','slug','product_unit','image','thumbnail_image','qty','price','discount','discount_price','shipping_cost','description','num_sell','status','created_by', 'updated_by'
    ];

    public function productCategories()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function productSubCategories()
    {
        return $this->belongsTo(ProductSubCategory::class, 'sub_category_id');
    }

    public function productSubSubCategories()
    {
        return $this->belongsTo(ProductSubSubCategory::class, 'sub_sub_category_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productOffer()
    {
        return $this->hasMany(ProductOffer::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product_sub_category) {
            $product_sub_category->slug = Str::slug($product_sub_category->name).Str::random(5);
            // $product_sub_category->created_by = Auth::user()->id;
        });

        static::updating(function ($product_sub_category) {
            $product_sub_category->slug = Str::slug($product_sub_category->name).Str::random(5);
            // $product_sub_category->updated_by = Auth::user()->id;
        });
    }
}
