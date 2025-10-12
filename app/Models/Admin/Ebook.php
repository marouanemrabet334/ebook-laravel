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
    	return $this->hasMany( EbookFile::class,'id','ebook_id');
    }

    public function author(){
    	return $this->hasOne(Author::class,'id','author_id');
    }



}