<?php

use App\Http\Controllers\Api\IndexApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {});

Route::get('/categories', [IndexApiController::class, 'showCategories']);
Route::get('/ebook', [IndexApiController::class, 'showEbook']);
Route::get('/ebook/soon', [IndexApiController::class, 'showSoonEbook']);
Route::get('/slider', [IndexApiController::class, 'showSlider']);
Route::get('/sub/categories', [IndexApiController::class, 'showSubCategories']);
Route::get('/authors', [IndexApiController::class, 'showAuthors']);
Route::get('/ads', [IndexApiController::class, 'showAds']);
