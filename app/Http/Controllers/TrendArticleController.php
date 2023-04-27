<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendArticleController extends Controller
{
    public function index(){

        $posts = $this->collect();
        return view('Admin.trend_articles.index',compact('posts'));

    }

    // ======= DETAIL =======
    public function detail($id){
        $collect = $this->collect();
        $post = $collect->find($id);

        return view('Admin.trend_articles.trend_detail',compact('post'));
    }

    // ===== Data Collect =====
    private function collect(){
        return
             $posts = ActionLog::select(
                'action_logs.*','posts.*',
                'categories.title as category_name', 'users.name as user_name',
                 DB::raw('COUNT(action_logs.post_id) as post_count')
             )

            ->leftJoin('posts','posts.id','action_logs.post_id')
            ->leftJoin('categories','categories.id','posts.category_id')
            ->leftJoin('users','users.id','posts.user_id')
            ->groupBy('action_logs.post_id')
            ->orderBy('post_count','desc')
            ->get();
    }

}