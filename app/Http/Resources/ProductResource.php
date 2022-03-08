<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'category_id'  => $this->category_id,
            'sub_category_id'  => $this->sub_category_id,
            'sub_sub_category_id'  => $this->sub_sub_category_id,
            'name'   => $this->name,
            'slug'   => $this->slug,
            'unit'   => $this->product_unit,
            'image'   => $this->icon ? url($this->icon) :  '',
            'banner' => $this->banner ? url($this->banner) :  '',
            'status' => $this->status,
            'type'   => 'product',
            'subsubcategories' => $this->subsubCategories,
            // 'products' => $this->products,
        ];
    }
}
