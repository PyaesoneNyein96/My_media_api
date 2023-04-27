<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\ApiArticleController;
use App\Http\Controllers\API\ApiCategoryController;
use App\Http\Controllers\API\ApiActionLogController;





// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user/login',[AuthController::class,'login']);
Route::post('user/register',[AuthController::class,'register']);
Route::post('user/re_login',[AuthController::class,'re_login']);


// POST
Route::get('posts',[ApiArticleController::class,'Posts']);
Route::post('posts/detail',[ApiArticleController::class,'detail']);
Route::post('posts/actionLog',[ApiActionLogController::class,'storeCount']);  // ACTION LOG


// SEARCH BY CATEGORY & CATEGORIES
Route::post('search',[ApiArticleController::class,'search']);
Route::post('categories/select',[ApiArticleController::class,'categorySelect']);

Route::get('categories',[ApiCategoryController::class,'categories']);
Route::get('fewCategories',[ApiCategoryController::class,'fewCategories']);