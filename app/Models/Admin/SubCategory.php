<?php

namespace App\Models\Admin;

use Database\Factories\SubCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_name_ar',
        'subcategory_image',
    ];

    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }
    protected static function newFactory()
    {
        return SubCategoryFactory::new();
    }
}
