<?php

namespace App\Models\Admin;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

     public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

}
