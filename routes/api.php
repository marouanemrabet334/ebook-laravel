<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\EbookApiController;
use App\Http\Controllers\Api\SliderApiController;
use App\Http\Controllers\Api\SubCategoryApiController;
use App\Http\Controllers\Api\AuthorApiController;
use App\Http\Controllers\Api\AdApiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {});

Route::get('/categories', [CategoryApiController::class, 'showCategories']);
Route::get('/ebook', [EbookApiController::class, 'showEbook']);
Route::get('/ebook/soon', [EbookApiController::class, 'showSoonEbook']);
Route::get('/slider', [SliderApiController::class, 'showSlider']);
Route::get('/sub-categories', [SubCategoryApiController::class, 'showSubCategories']);
Route::get('/authors', [AuthorApiController::class, 'showAuthors']);
Route::get('/ads', [AdApiController::class, 'showAds']);
