<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiArticleController extends Controller
{
    // All Articles
    public function Posts(){
        $posts = Post::select('posts.*','users.name as user_name','categories.title as category_name')
        ->leftJoin('categories', 'posts.category_id','categories.id')
        ->leftJoin('users','posts.user_id','users.id')->orderBy('created_at','desc')->get();

        return response()->json([
            'posts' => $posts
        ], 200);
    }


    public function detail(Request $req){
        logger($req);

        $post = Post::
        select('posts.*','users.name as user_name','categories.title as category_name')
        ->join('users', 'posts.user_id','users.id')->join('categories','posts.category_id','categories.id')->
        where('posts.id',$req->id)->first();

        return response()->json([
            'postDetail' => $post
        ], 200);
    }



    public function search(Request $req){

      $key = $req->key;
    //   $result = Post::where('title','like', "%$key%")
    //                 ->orWhere('description','like', "%$key%")

    //                 ->orWhereHas('category',function($c) use ($key) {
    //                     $c->where('title','like', "%$key%");
    //                 })

    //                 ->orWhereHas('user', function($u) use($key) {
    //                     $u->where('name','like',"%$key%")
    //                     ->orWhere('email','like',"%$key%")
    //                     ->orWhere('address','like',"%$key%")
    //                     ->orWhere('phone','like',"%$key%");
    //                 })

                $result = Post::select('categories.title as category_name','posts.*','users.name as user_name')
                ->join('categories','posts.category_id','categories.id')
                ->join('users','posts.user_id','users.id')

                ->where('users.name','like', "%$key%")
                ->orWhere('email','like',"%$key%")
                ->orWhere('address','like',"%$key%")
                ->orWhere('phone','like',"%$key%")
                ->orWhere('posts.title','like', "%$key%")
                ->orWhere('posts.title','like', "%$key%")
                ->orWhere('categories.title','like', "%$key%")
                ->get();

        return response()->json([
        'result' => $result,
        ], 201);
    }



    // Select By Category

    public function categorySelect(Request $req){

        $cat = $req->id;
        $posts = Post::where('category_id', $cat)->get();

        return response()->json([
            'postsSelect' => $posts
        ], 200);
    }



}