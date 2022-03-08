<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
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
            'category_id' => $this->category_id,
            'category_name' => $this->productcategories->name,
            'category_slug' => $this->productcategories->slug,
            'name'   => $this->name,
            'slug'   => $this->slug,
            'image'   => $this->image,
            'banner' => $this->banner,
            'status' => $this->status,
            'subSubCategories' => $this->subsubCategories,
            'products' => $this->products,
        ];
    }
}
