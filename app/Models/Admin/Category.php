<?php

namespace App\Models\Admin;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function newFactory()
{
    return CategoryFactory::new();
}
}
