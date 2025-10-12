<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EbookFileResource extends JsonResource
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
            'ebook_id' => $this->ebook_id,
            'file_path' => encrypt(asset($this->file_path)),
            'file_name' => $this->file_name,
            'file_size' => $this->file_size,
            'file_type' => $this->file_type,
            'file_extension' => $this->file_extension,
            'status' => $this->status,
            'created_at' => $this->created_at->format('Y-m-d'),
        ];
    }
}