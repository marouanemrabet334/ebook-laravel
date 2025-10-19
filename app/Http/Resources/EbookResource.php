<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EbookResource extends JsonResource
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
            'subcategory_id' => $this->subcategory_id,
            'ebook_name' => $this->ebook_name,
            'ebook_img' => asset('uploads'.$this->ebook_img) ?? '',
            'ebook_img_url' => $this->ebook_img_url ?? '',
            'author_id' => new AuthorResource($this->author),
            'pages' => $this->pages,
            'lang_ebook' => $this->lang_ebook,
            'short_desc' => $this->short_desc,
            'long_desc' => $this->long_desc,
            'pdf_from_url' => $this->pdf_from_url,
            'hot_deals' => $this->hot_deals,
            'featured_slider' => $this->featured_slider,
            'special_offer' => $this->special_offer,
            'soon' => $this->soon,
            'status' => $this->status,
            'free' => $this->free,
            'rating' => $this->rating,
            'created_at' => $this->created_at->format('Y-D-m'),
            'pdf' => EbookFileResource::collection($this->pdf),
        ];
    }
}
