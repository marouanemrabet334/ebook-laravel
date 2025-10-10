<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Ebook extends Model  
{
    use HasFactory;
    

    protected $guarded = [];

    protected $casts = [
        'pdf_from_local' => 'array',
    ];

    public function pdf(){
    	return $this->hasMany(MultiFile::class,'ebook_id');
    }

    public function author(){
    	return $this->hasOne(Author::class,'id','author_id');
    }
//    public function registerMediaConversions(Media $media = null): void
//    {
//        $this
//            ->addMediaConversion('ebooks')
//            ->fit(Manipulations::FIT_CROP, 300, 300)
//            ->nonQueued();
//    }


}