<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EbookController;

use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\AuthorController;


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

    /*     Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard'); */
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index'); //admin.dashboard.index

    Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('logout'); // Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    
    Route::prefix('category')->group(function () {
        Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
        Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
        Route::get('/active/{id}', [CategoryController::class, 'CategoryActive'])->name('category.active');
        Route::get('/inactive/{id}', [CategoryController::class, 'CategoryInactive'])->name('category.inactive');

        // Admin Sub Category All Routes

        Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
        Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
        Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
        Route::post('/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
        Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
        Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    });


    Route::prefix('ebook')->group(function () {
        Route::get('/all', [EbookController::class, 'AllEbook'])->name('all.ebook');
        Route::get('/add', [EbookController::class, 'AddEbook'])->name('add.ebook');
        Route::post('/store', [EbookController::class, 'StoreEbook'])->name('ebook.store');
        Route::get('/edit/{id}', [EbookController::class, 'EditEbook'])->name('ebook.edit');
        Route::post('/data/update', [EbookController::class, 'EbookDataUpdate'])->name('ebook.update');
        Route::post('/thambnail/update', [EbookController::class, 'ThambnailImageUpdate'])->name('update.ebook.thambnail');
        Route::post('/file/update', [EbookController::class, 'MultiFilesUpdate'])->name('update.ebook.file');
        Route::get('/multifile/delete/{id}', [EbookController::class, 'MultiFileDelete'])->name('ebook.multifile.delete');
        Route::get('/inactive/{id}', [EbookController::class, 'EbookInactive'])->name('ebook.inactive');
        Route::get('/active/{id}', [EbookController::class, 'EbookActive'])->name('ebook.active');
        Route::get('/delete/{id}', [EbookController::class, 'EbookDelete'])->name('ebook.delete');
    });
    Route::prefix('author')->group(function () {
        Route::get('/all', [AuthorController::class, 'AllAuthor'])->name('all.author');
        Route::post('/store', [AuthorController::class, 'AuthorStore'])->name('author.store');
        Route::get('/edit/{id}', [AuthorController::class, 'AuthorEdit'])->name('author.edit');
        Route::post('/update/{id}', [AuthorController::class, 'AuthorUpdate'])->name('author.update');
        Route::get('/delete/{id}', [AuthorController::class, 'AuthorDelete'])->name('author.delete');
    });
    Route::prefix('app')->group(function () {
        Route::get('/edit', [AdsController::class, 'AdsEdit'])->name('edit.ads');
        Route::post('/update/{id}', [AdsController::class, 'AdsUpdate'])->name('ads.update');
        //Route::get('/delete/{id}', [AuthorController::class, 'AuthorDelete'])->name('author.delete');
    });
});