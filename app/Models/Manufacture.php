<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Manufacture extends Model
{
    use HasFactory;

    protected $table = "manufactures";
    protected $fillable = [
        'manufacture_name', 'email', 'phone', 'address', 'status', 'created_by', 'updated_by'
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
    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
    
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($manufacture) {
    //         $manufacture->created_by = Auth::user()->id;
    //     });

    //     static::updating(function ($manufacture) {
    //         $manufacture->updated_by = Auth::user()->id;
    //     });
    // }
}
