<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
                'author_name' => $this->author_name,
                'about_author' => $this->about_author,
                'author_image' => asset('uploads'.$this->author_image) ?? '',
                'created_at' => $this->created_at->format('Y-D-m'),
            ];
        }

}
