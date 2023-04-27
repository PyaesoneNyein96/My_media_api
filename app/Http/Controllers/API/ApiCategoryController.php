<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiCategoryController extends Controller
{
    public function categories(){
        $categories = Category::get();
        return response()->json([
            'categories'=> $categories,
        'status' => 'all'], 200);
    }

    public function fewCategories(){
        $fewCategories = Category::take(5)->get();
         return response()->json([
            'fewCategories' => $fewCategories,
            'status' => '4'
        ], 200);

    }



}