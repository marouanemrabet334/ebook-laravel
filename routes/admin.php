<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EbookController;

use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\EbookFilesController;

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'loginForm'])->name('admin.login.index');

    Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
});

// Authenticated routes

Route::group([
    'middleware' => ['auth', 'user.type:admin'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index'); //admin.dashboard.index

    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');


    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/category/active/{id}', [CategoryController::class, 'active'])->name('category.active');
    Route::get('/category/inactive/{id}', [CategoryController::class, 'inactive'])->name('category.inactive');

    // Admin Sub Category All Routes
    Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('subcategory.index');
    Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/category/sub/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
    Route::get('/category/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);

    Route::get('/ebook/all', [EbookController::class, 'index'])->name('ebook.index');
    Route::get('/ebook/create', [EbookController::class, 'create'])->name('ebook.create');
    Route::post('/ebook/store', [EbookController::class, 'store'])->name('ebook.store');
    Route::get('/ebook/edit/{id}', [EbookController::class, 'edit'])->name('ebook.edit');
    Route::post('/ebook/update', [EbookController::class, 'update'])->name('ebook.update');
    // Route::post('/ebook/thambnail/update', [EbookController::class, 'ThambnailImageUpdate'])->name('update.ebook.thambnail');

    Route::post('/ebook/file/update/{id}', [EbookFilesController::class, 'update'])->name('update.ebook.file');
    Route::get('/ebook/file/delete/{id}', [EbookFilesController::class, 'deleteFile'])->name('ebook.delete.file');

    Route::get('/ebook/inactive/{id}', [EbookController::class, 'inactive'])->name('ebook.inactive');
    Route::get('/ebook/active/{id}', [EbookController::class, 'active'])->name('ebook.active');
    Route::get('/ebook/delete/{id}', [EbookController::class, 'destroy'])->name('ebook.delete');


    Route::get('/author/all', [AuthorController::class, 'AllAuthor'])->name('author.index');
    Route::post('/author/store', [AuthorController::class, 'AuthorStore'])->name('author.store');
    Route::get('/author/edit/{id}', [AuthorController::class, 'AuthorEdit'])->name('author.edit');
    Route::post('/author/update/{id}', [AuthorController::class, 'AuthorUpdate'])->name('author.update');
    Route::get('/author/delete/{id}', [AuthorController::class, 'AuthorDelete'])->name('author.delete');


    Route::get('/ads/edit', [AdsController::class, 'edit'])->name('edit.ads');
    Route::post('/update/{id}', [AdsController::class, 'update'])->name('ads.update');
    //Route::get('/delete/{id}', [AuthorController::class, 'AuthorDelete'])->name('author.delete');

});
