<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserCotroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard',[UserCotroller::class,'dashboard'])->name('admin.dashboard');

    Route::resource('posts', PostController::class);
});
Route::get('/login',[AuthController::class,'loginForm'])->name('login.form');
Route::post('/login',[AuthController::class,'login'])->name('login');
