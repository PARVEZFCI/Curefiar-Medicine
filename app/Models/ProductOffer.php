<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;


class ProductOffer extends Model
{
    use HasFactory;

    protected $table = "product_offers";
    protected $fillable = [
        'image','title','status','created_by','updated_by'
    ];

    public function scopeActive($q)
    {
        return $q->where('status',1);
    }

    /**
     * Get all of the offer-products for the ProductOffer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offerProducts()
    {
        return $this->hasMany(OfferProducts::class, 'offer_id', 'id');
    }

    public function scopeOfferRelation($offer)
    {
        return $offer->active()->with(['offerProducts' => function($q) {
            $q->with('product');
        }]);
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($product_offer) {
    //         $product_offer->created_by = Auth::user()->id;
    //     });

    //     static::updating(function ($product_offer) {
    //         $product_offer->updated_by = Auth::user()->id;
    //     });
    // }
}
