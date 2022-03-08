<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;

    protected $table = "medicine_categories";
    protected $fillable = [
        'name', 'slug', 'status', 'created_by', 'updated_by'
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

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
            $category->slug = Str::slug($category->name);
            // $category->created_by = Auth::user()->id;
        });

        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
            // $category->created_by = Auth::user()->id;
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->name);
            // $category->updated_by = Auth::user()->id;
        });
    }
}
