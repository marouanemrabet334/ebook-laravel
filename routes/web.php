<?php

use App\Http\Controllers\Admin\EbookController;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */
// Guest routes
Route::middleware('guest')->group(function () {
   

    Route::get('login', [UserAuthController::class, 'index'])
                ->name('user.login.index');

});


Route::get('/add', [EbookController::class, 'index'])->name('add.fille');
Route::post('/store', [EbookController::class, 'filesUpload'])->name('store.file');

// User All Routes
/*Route::get('/', [UserController::class, 'Index']);
Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');

Route::get('/contact',function(){
    return 'Close';
}
)->middleware('check_day');*/
Route::get('/', [FrontendController::class, 'index'])
    ->name('frontend.index');

//php artisan migrate:fresh
Route::middleware(['auth', 'user.type:user'])->group(function () {

    Route::get('/dashboard',
        [UserController::class, 'index'])->name('user.dashboard.index');
  
        Route::get('/logout', [UserAuthController::class, 'destroy'])->name('user.logout');

    //  Route::get('/', HomeC::class)->name('home');
    //
    //  Route::get('users', [UserController::class, 'index'])->name('users.index');
    //
    // Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    // Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

});