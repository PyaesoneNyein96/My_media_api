<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    public function index(){

        // dd(request()->all());
        $users = user::when(request('key'), function($Q){
            $key = request('key');
            $Q->orWhere('name','like',"%$key%")
            ->orWhere('email','like',"%$key%")
            ->orWhere('address','like',"%$key%")
            ->orWhere('phone','like',"%$key%")
            ->orWhere('gender','like',"%$key%")
            ->orWhere('role','like',"%$key%");
        })->select('id','name','email','phone','address','gender')->orderBy('created_at','asc')->paginate(7);
        // dd($users->toArray());
        // $users = User::select('id','name','email','phone','address','gender')->orderby('id','desc')->paginate(5);
        $users->appends(request()->all());
        return view('Admin.AdminList.admin_list',compact('users'));
    }


    public function delete($id){

        User::where('id', $id)->delete();
        return redirect()->back()->with('info', 'Account Deleted Successfully');
    }



}
