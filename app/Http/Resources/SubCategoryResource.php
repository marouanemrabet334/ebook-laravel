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
            'id' => $this->id,
            'category_id' => $this->category_id,
            'subcategory_name' => $this->subcategory_name,
            'subcategory_image' => encrypt(asset($this->subcategory_image)) ?? '',
            'created_at' => $this->created_at->format('Y-D-m'),

        ];
    }
}