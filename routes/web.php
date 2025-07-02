<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::get('/writers/posts',[UserCotroller::class,'index'])->name('writer.posts.index');
    Route::get('/writers/posts/create',[UserCotroller::class,'create'])->name('writer.posts.create');
    Route::post('/writers/posts/store',[UserCotroller::class,'store'])->name('writer.posts.store');
    Route::get('/writers/posts/{post}/edit',[UserCotroller::class,'edit'])->name('writer.posts.edit');
    Route::put('/writers/posts/{post}/update',[UserCotroller::class,'update'])->name('writer.posts.update');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');

});
Route::middleware('guest')->group(function () {
    Route::get('/login',[AuthController::class,'loginForm'])->name('login.form');
    Route::post('/login',[AuthController::class,'login'])->name('login');
});
