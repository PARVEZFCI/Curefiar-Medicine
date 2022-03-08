<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferProducts extends Model
{
    use HasFactory;

    protected $table = "offer_products";
    protected $fillable = [
        'product_id','offer_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function offer()
    {
        return $this->belongsTo(ProductOffer::class, 'offer_id');
    }
}
