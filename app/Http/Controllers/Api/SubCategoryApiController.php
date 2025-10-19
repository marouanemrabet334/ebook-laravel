<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Http\Resources\SubCategoryResource;

class SubCategoryApiController extends Controller
{
        public function showSubCategories()
    {
        // $files = FileUp::latest()->get();
        $subcategories = SubCategory::where('status', 1)
            ->latest()->get();
        $subColRes =  SubCategoryResource::collection($subcategories);

        return  response()->json($subColRes, 200);
    }

}
