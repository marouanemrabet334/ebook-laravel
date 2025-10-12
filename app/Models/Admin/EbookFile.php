<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EbookFile extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function ebook(){
    	return $this->belongsTo(Ebook::class,'ebook_id','id');
    }
}