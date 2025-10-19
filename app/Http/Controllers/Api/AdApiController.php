<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AdsResource;
use App\Models\AdsSetting;
class AdApiController extends Controller
{
     public function showAds()
    {
        $ad = AdsSetting::first();
        return response()->json(new AdsResource($ad), 200);
    }
}
