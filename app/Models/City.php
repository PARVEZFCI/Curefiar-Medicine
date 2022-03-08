<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = "cities";
    protected $fillable = [
        'city_name', 'status',
    ];
    
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Get all of the areas for the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function area(): HasMany
    {
        return $this->hasMany(Area::class, 'city_id', 'id');
    }

    public function scopeCityName($query, $city)
    {
        return $query->where('id', $city);
    }

    public function getCityName($city)
    {
        return $this->where('id', $city)->first('city_name');
    }
}
