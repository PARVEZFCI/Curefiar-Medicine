<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Medicine extends Model
{
    use HasFactory;

    protected $table = "medicines";
    protected $fillable = [
        'medicine_name', 'slug', 'category_id', 'generic_id', 'manufacture_id', 'dosage', 'quantity', 'convertion_factor', 'image', 'details','status', 'created_by', 'updated_by'
    ];
    

    /**
     * Get the medicine record associated with the medicine status is 1.
     *
     * @return HasMany
    */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Get the category record associated with the medicine.
     *
     * @return BelongsTo
     */
    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    /**
     * Get the generic record associated with the medicine.
     *
     * @return BelongsTo
     */
    public function generic() 
    {
        return $this->belongsTo(Generic::class, 'generic_id');
    }


    /**
     * Get the manufacture record associated with the medicine.
     *
     * @return BelongsTo
    */
    public function manufacture() 
    {
        return $this->belongsTo(Manufacture::class, 'manufacture_id');
    }

    /**
     * Relation with many medicine prices.
     *
     * @return HasMany
    */
    public function medicinePrices()
    {
        return $this->hasMany(MedicinePrice::class, 'medicine_id');
    }

    
    public function scopeRelation($q)
    {   
        return $q->with('category', 'generic', 'manufacture')
            ->with(['medicinePrices' => function($q) {
                $q->orderBy('type', 'ASC');
            }])->with('medicinePrices.unit');
    }

    public function scopeSearch($query, $q)
    {
        return $query->where('medicine_name', 'LIKE', "%{$q}%")
            ->orWhere('details', 'LIKE', "%{$q}%");
        
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($medicine) {
            $medicine->slug = Str::slug( $medicine->medicine_name, '-').'-'.Str::random(5);
            // $medicine->created_by = Auth::user()->id;
        });

        static::creating(function ($medicine) {
            $medicine->slug = Str::slug( $medicine->medicine_name, '-').'-'.Str::random(5);
            // $medicine->created_by = Auth::user()->id;
        });

        static::updating(function ($medicine) {
            $medicine->slug = Str::slug( $medicine->medicine_name, '-').'-'.Str::random(5);
            // $medicine->updated_by = Auth::user()->id;
        });
    }
}
