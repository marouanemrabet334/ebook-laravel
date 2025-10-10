<?php

namespace App\Models\Admin;

use Database\Factories\AuthorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function ship(){
    	return $this->hasOne(Ebook::class,'author_id','id');
    }

    protected static function newFactory()
    {
        return AuthorFactory::new();
    }

}
