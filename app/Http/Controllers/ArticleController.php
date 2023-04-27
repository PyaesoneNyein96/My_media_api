<?php

namespace App\Http\Controllers;

use Storage;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    // LIST
    public function index(){

        $categories =  Category::get();
        $posts = Post::select('posts.*','users.name as user_name','categories.title as category_name')
        ->leftJoin('users','posts.user_id', 'users.id')
        ->leftJoin('categories','posts.category_id','categories.id')
        ->orderBy('created_at','desc')->get();
        // dd($posts->toArray());
        return view('Admin.articles.index',compact('categories','posts'));
    }





    // CREATE
    public function create(Request $request){

        $data = $this->getData($request);
        $this->validationCheckPost($request,'upload');

        if($request->hasFile('post_img')){
            $img = $request->file('post_img');
            $imgName = uniqid().'_POST_'.$img->getClientOriginalName();
            $request->file('post_img')->storeAs('public/Post',$imgName);
            // $img->move(public_path().'/Post',$imgName);
            // $img->move(storage_path().'/Post',$imgName);
        }
        $data['image'] = $imgName;
        Post::create($data);
        return redirect()->back()->with('info','Article successfully uploaded');
    }





// UPDATE PAGE
    public function updatePage(){
        $postEdit = Post::find(request()->id);
        $categories=Category::all();
        logger($postEdit);
        $oldCat = Category::where('category',$postEdit->category_id);
        // $cat = 'cc';
        // dd($cat);
        return response()->json(['postEdit'=> $postEdit, 'cat'=> $categories , 'oldCat'=> $oldCat], 200 );
    }

// Update function
    public function update(Request $request){
        // dd(request()->toArray());
        $data = $this->getData($request);
        $this->validationCheckPost($request,'update');
        $oldImg = Post::find($request->post_id)->image;
        // dd($oldImg);
        if($request->hasFile('post_img')){
            $img = $request->file('post_img');
            $imgName = uniqid().'_update_'.$img->getClientOriginalName();
            $request->file('post_img')->StoreAs('public/Post',$imgName);
            $data['image'] = $imgName;
            Storage::delete('/public/Post/'.$oldImg);
        }
        Post::where('id',$request->post_id)->update($data);
        return back()->with('info','success');

    }




    // DELETE
    public function delete(){
        $img = Post::find(request()->id)->image;
        Storage::delete('/public/Post/'.$img);
        Post::where('id', request()->id)->delete();
        $totalCount = Post::count();


        return response()->json(
            [   'total' => $totalCount
                ,'status' => true], 200);

    }




//  PRIVATE FUNCTIONS
    // VALIDATION CHECK
    private function validationCheckPost($req,$status){
        $rules =   [
            'post_user_id'=> 'required',
            'post_title' => 'required',
            'post_description' => 'required',
            'post_category' => 'required',
            // 'post_img' =>  'required',File::image()->types(['png','jpg','jpeg'])
        ];
        if($status == 'update'){
            $rules['post_img'] =  File::image()->types(['png','jpg','jpeg']);
        }else{
            $rules['post_img'] =  ['required',File::image()->types(['png','jpg','jpeg'])];
        }

        Validator::make($req->all(),$rules)->validate();
    }

    private function getData($req){
        return [
            'user_id'=> $req->post_user_id,
            'title' => $req->post_title,
            'description' => $req->post_description,
            'category_id' => $req->post_category,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            // 'image' => $req->post_img,
        ];
    }






}