<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiFile extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function ship(){
    	return $this->belongsTo(Ebook::class,'ebook_id','id');
    }
}
