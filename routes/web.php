<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminListController;
use App\Http\Controllers\TrendArticleController;



Route::get('/', function () {
    return view('welcome');
});
Route::middleware([ 'auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::redirect('/dashboard', 'admin/dashboard');
    Route::prefix('admin')->group(function () {

        Route::get('/dashboard',[AuthController::class,'index'])->name('admin@dashboard');
        Route::get('/profile',[ProfileController::class,'index'])->name('admin@Profile');
        Route::get('/categories',[CategoryController::class,'index'])->name('admin@Category');
        Route::get('/articles',[ArticleController::class,'index'])->name('admin@articles');
        Route::get('/admin-list',[AdminListController::class,'index'])->name('admin@admin-list');
        Route::get('/trend',[TrendArticleController::class,'index'])->name('admin@trend');
    });
});