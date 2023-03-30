<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    // SHOW
    public function index(){

        $categories = Category::when(request('key'), function($Q){
            $key = request('key');
            $Q->orWhere('title', 'like', "%$key%")
            ->orWhere('description','like', "%$key%");
        })->orderBy('created_at', 'desc')->get();


        // $categories = Category::orderBy('created_at','desc')->get();
        return view('Admin.category.index',compact('categories'));
    }



    // CREATE
    public function addCategories(){
        $data = $this->getData(request());
        $this->validationCheck(request());
        Category::create($data);

        return redirect()->back()->with('info', 'Category added successfully');
    }



    //Re Use show page to edit
    public function editCategory($id){

        $categoryEdit = Category::select('title','description','id')->where('id',$id)->first();
        $categories = Category::orderBy('created_at','desc')->get();
        return view('Admin.category.index',compact(['categoryEdit','categories']));
    }

    // Update
    public function updateCategory(Request $req){

        $category = Category::find($req->id);
        $data = $this->getData($req);
        $this->validationCheck($req);

        Category::where('id', $req->id)->update($data);
        return redirect()->route('admin@Category')->with('info', 'Category Updated successfully');
    }

    // DELETE
    public function deleteCategory($id){

        Category::where('id',$id)->delete();
        return redirect()->back()->with('info','Category Deleted Successfully');
    }





    private function getData($req){
        return [
            'title' => $req->categoryName,
            'description' => $req->categoryDescription
        ];
    }

    private function validationCheck($req){
        Validator::make($req->all(), [
            'categoryName' => 'required',
            'categoryDescription' => 'required'
        ])->validated();
    }


}