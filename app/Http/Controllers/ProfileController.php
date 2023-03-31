<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    // INDEX xxxxxxxxxxxxxxxxxxxx
    public function index(){
        $user = User::find(Auth::id());
        return view('Admin.Profile.Profile',compact('user'));
    }

    // UPDATE ====================
    public function update(Request $req){
        // dd($req->all());
       $data = $this->getData($req);
       $this->validated($req);
       User::where('id', Auth::id())->update($data);

       return redirect()->back()->with('info', 'You successfully updated your Profile.');
    }

    // Password Change Page =================

    public function ChangePasswordPage(){
        return view('Admin.Profile.changePassword');
    }

    public function changePassword(){

        $valid = $this->passValidator(request());

        $dbPass = Auth::user()->password;
        if(Hash::check(request()->oldPassword, $dbPass )){
                User::where('id', Auth::id())->update(['password'=> hash::make(request()->newPassword)]);

                return redirect()->route('admin@dashboard')->with('info','Your Password has been Changed Successfully, Please Login again');
        }else{

            return redirect()->back()->with('err', 'Old password not Match !');
        }


    }





    private function getData($req){
        return[
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'address' => $req->address,
            'gender' => $req->gender,
            'bio' => $req->bio,
            'updated_at' =>Carbon::now()
        ];
    }

    private function validated($req){
        Validator::make($req->all(),[
            'name' => 'required',
            'email'=> 'required|unique:users,email,'.$req->id,
        ]
        )->validated();
    }

    private function passValidator($req){
        Validator::make($req->all(),[
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:newPassword',
        ],[
            'oldPassword.oldPassword' => 'Your Old password is invalid !'
        ])->validated();
    }

}