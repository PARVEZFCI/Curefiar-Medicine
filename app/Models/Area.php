<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = "areas";
    protected $fillable = [
        'area_name', 'city_id', 'status',
    ];
    
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Get the city that owns the Area
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function cityWiseArea($cityId)
    {   
        dd($cityId);
        return $this->where('city_id', $cityId);
    }
}
