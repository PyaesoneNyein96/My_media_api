<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminListController;
use App\Http\Controllers\TrendArticleController;

// Route::redirect('/', '/dashboard');

Route::get('/', function () {
    return view('welcome');
});
Route::middleware([ 'auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::redirect('/', 'admin/dashboard');
    Route::redirect('/dashboard', 'admin/dashboard');


    Route::prefix('admin')->group(function () {

        Route::get('/dashboard',[AuthController::class,'index'])->name('admin@dashboard');

        // ADMIN PROFILE
        Route::get('/profile',[ProfileController::class,'index'])->name('admin@Profile');
        Route::post('/profile/update',[ProfileController::class,'update'])->name('admin@profileUpdate');
        Route::get('/profile/changePassword',[ProfileController::class,'ChangePasswordPage'])->name('admin@changePassPage');
        Route::post('/profile/changePass', [ProfileController::class,'changePassword'])->name('admin@changePass');

        // ADMIN USER
        Route::get('/list',[AdminListController::class,'index'])->name('admin@admin-list');
        Route::get('/delete/{id}',[AdminListController::class,'delete'])->name('admin@adminList-delete');

        // ADMIN CATEGORY
        Route::get('/categories',[CategoryController::class,'index'])->name('admin@Category');
        Route::post('/categories/add', [CategoryController::class,'addCategories'])->name('admin@categoriesAdd');
        Route::get('/category/edit/{id}', [CategoryController::class,'editCategory'])->name('admin@categoryEdit');
        Route::post('/category/update',[CategoryController::class,'updateCategory'])->name('admin@categoryUpdate');
        Route::get('/category/delete/{id}', [CategoryController::class,'deleteCategory'])->name('admin@categoryDelete');

        // ADMIN POSTS
        Route::get('/post',[ArticleController::class,'index'])->name('admin@articles');
        Route::post('/post/creation',[ArticleController::class,'create'])->name('admin@postCreate');
        Route::get('/post/delete',[ArticleController::class,'delete'])->name('admin@postDelete'); //ajax
        Route::get('/post/updateDialog',[ArticleController::class,'updatePage'])->name('admin@postUpdateDialog'); //ajax
        Route::post('/post/update',[ArticleController::class, 'update'])->name('admin@postUpdate');


        Route::get('/trend',[TrendArticleController::class,'index'])->name('admin@trend');
    });
});