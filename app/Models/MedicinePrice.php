<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MedicinePrice extends Model
{
    use HasFactory;

    protected $table = "medicine_prices";
    protected $fillable = [
        'medicine_id', 'unit_id', 'type', 'price', 'discount', 'discount_price','created_by', 'updated_by'
    ];
    
    /**
     * Get the unit record associated with the unit.
     *
     * @return BelongsTo
     */
    public function unit() 
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($medicinePrice) {
    //         $medicinePrice->created_by = Auth::user()->id;
    //     });

    //     static::updating(function ($medicinePrice) {
    //         $medicinePrice->updated_by = Auth::user()->id;
    //     });
    // }
}
