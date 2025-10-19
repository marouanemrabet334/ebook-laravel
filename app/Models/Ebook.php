<?php

namespace App\Models;

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
    	return $this->hasMany( EbookFile::class,'ebook_id','id');
    }

    public function author(){
    	return $this->hasOne(Author::class,'id','author_id');
    }



}