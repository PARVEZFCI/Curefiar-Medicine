<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubSubCategoryResource extends JsonResource
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
            'category_id'   => $this->category_id,
            'sub_category_id' => $this->sub_category_id,
            'category_name' => $this->productCategories->name,
            'category_slug' => $this->productCategories->slug,
            'sub_category_name' => $this->productSubCategories->name,
            'sub_category_slug' => $this->productSubCategories->slug,
            'name'     => $this->name,
            'slug'     => $this->slug,
            'image'    => $this->image,
            'banner'   => $this->banner ? $this->banner :  '',
            'status'   => $this->status,
            'products' => $this->products,
        ];
    }
}
