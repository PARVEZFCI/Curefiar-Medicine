<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = "order_details";
    protected $fillable = [
        'order_id','product_id','medicine_id','product_name','product_type','discount','price','quantity','sub_total','unit'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
