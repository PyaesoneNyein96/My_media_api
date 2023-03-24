<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrendArticleController extends Controller
{
    public function index(){
        return view('Admin.trend_articles.index');
    }
}