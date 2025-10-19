<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryApiController extends Controller
{
       public function showCategories()
    {
        // $files = FileUp::latest()->get();
        $categories = Category::where('status', 1)
            ->latest()->get();
        $col =  CategoryResource::collection($categories);

        return  response()->json($col, 200);
    }
}
