<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EbookFileResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ebook_id' => $this->ebook_id,
            'file_path' => asset('uploads'.$this->file_path),
            'file_name' => $this->file_name,
            'file_size' => $this->formatFileSize($this->file_size),
            'file_type' => $this->file_type,
            'file_extension' => $this->file_extension,
            'status' => $this->status,
            'created_at' => $this->created_at->format('Y-m-d'),
        ];
    }

    private function formatFileSize($bytes)
    {
        if ($bytes >= 1073741824) {
            return round($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return round($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return round($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' B';
        }
    }
}