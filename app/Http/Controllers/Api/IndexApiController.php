<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdsResource;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\EbookResource;
use App\Http\Resources\SubCategoryResource;
use App\Models\Admin\AdsSetting;
use App\Models\Admin\Author;
use App\Models\Admin\Category;
use App\Models\Admin\Ebook;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;

class IndexApiController extends Controller
{
    //
    public function showCategories()
    {
        // $files = FileUp::latest()->get();
        $categories = Category::where('status', 1)->latest()->get();
        $col =  CategoryResource::collection($categories);

        return  response()->json($col, 200);
    }
    public function showSubCategories()
    {
        // $files = FileUp::latest()->get();
        $subcategories = SubCategory::orderBy('id', 'DESC')->get();
        $subcol =  SubCategoryResource::collection($subcategories);

        return  response()->json($subcol, 200);
    }



    public function showEbook()
    {

        $ebooks = Ebook::orderBy('id', 'DESC')->with('author')->with('pdf')->get();
        $books =  EbookResource::collection($ebooks);

        return
            response()->json($books, 200);
    }
    public function showSlider()
    {
        $slider = Ebook::where('status', 1)->orderBy('id', 'DESC')->with('pdf')->get();
        $slide =  EbookResource::collection($slider);
        return response()->json($slide, 200);
    }
    public function showSoonEbook()
    {
        $soons = Ebook::where('soon', 1)->orderBy('id', 'DESC')->with('pdf')->get();
        $soon =  EbookResource::collection($soons);
        return response()->json($soon, 200);
    }

    public function showAuthors()
    {
        $authors = Author::orderBy('id', 'DESC')->get();
        $author =  AuthorResource::collection($authors);
        return response()->json($author, 200);
    }

    public function showAds()
    {
        $ads = AdsSetting::get();
        $ad =  AdsResource::collection($ads);
        return response()->json($ad, 200);
    }
}
