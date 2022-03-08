<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Unit extends Model
{
    use HasFactory;

    protected $table = "units";
    protected $fillable = [
        'unit_name', 'symbol', 'status', 'created_by', 'updated_by'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Relation with many medicine.
     *
     * @return HasMany
     */
    public function medicinePrices()
    {
        return $this->hasMany(Medicine::class);
    }

    // /**
    //  * Get the medicine records associated with the units.
    //  *
    //  * @return HasMany
    //  */
    // public function medicines()
    // {
    //     return $this->hasMany(Medicine::class)->orderBy('created_at', 'desc');
    // }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($unit) {
    //         $unit->created_by = Auth::user()->id;
    //     });

    //     static::updating(function ($unit) {
    //         $unit->updated_by = Auth::user()->id;
    //     });
    // }
}
