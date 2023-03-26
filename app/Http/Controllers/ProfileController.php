<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    public function index(){
        $user = User::find(Auth::id());
        return view('Admin.Profile.Profile',compact('user'));
    }

    public function update(Request $req){
        // dd($req->all());
       $data = $this->getData($req);
       $this->validated($req);
       User::where('id', Auth::id())->update($data);

       return redirect()->back()->with('info', 'You successfully updated your Profile.');

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

}