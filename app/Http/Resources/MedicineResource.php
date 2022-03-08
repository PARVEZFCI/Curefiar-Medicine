<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'     => $this->id,
            'name'   => $this->medicine_name,
            'slug'   => $this->slug,
            'category_id' => $this->category_id,
            'generic_id'  => $this->generic_id,
            'manufacture_id' => $this->manufacture_id,
            'dosage'   => $this->dosage,
            'qty' => $this->quantity ? $this->quantity : 1,
            'details' => $this->details ? $this->details : '',
            'image' => $this->image,
            'status' => $this->status,
            'type'   => 'medicine',
            'category'   => $this->category,
            'prices' => $this->medicinePrices, 
        ];
    }
}
