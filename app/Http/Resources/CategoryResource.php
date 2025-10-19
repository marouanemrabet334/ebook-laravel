<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'category_name' => $this->category_name,
            'category_image' => asset('uploads'.$this->category_image),
            'category_icon' => $this->category_icon,
            'created_at' => $this->created_at->format('Y-D-m'),
            'status' => $this->status,
        ];
    }
}