<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ebook;
use App\Http\Resources\EbookResource;
class SliderApiController extends Controller
{

    public function showSlider()
    {
        $slider = Ebook::where('status', 1)->orderBy('id', 'DESC')->with('pdf')->get();
        $slide =  EbookResource::collection($slider);
        return response()->json($slide, 200);
    }

}