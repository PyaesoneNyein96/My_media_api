<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // Redirect and show for start up

    public function index(){
        return view('Admin.dashboard.index');
    }

    // Login

    public function login(Request $request){

        // logger($request);

        $user = User::where('email',$request->email)->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                return response()->json([
                    'user'=> $user,
                    'token' => $user->createToken(time())->plainTextToken,
                    ],
                     200);
            }else {
                return response()->json([
                    'user' => null,
                    'token'=>null,
                    'auth' =>'not Allowed'
                    ]);
            }
        }
    }

    // Re_login

    public function re_login(Request $request){
    // logger($request);
        $user = User::where('email', $request->email)->first();

        return response()->json([
            'user'=> $user,
            'token' => $user->createToken(time())->plainTextToken,
        ], 200);

    }


    // Register

    public function register(Request $request){
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        User::create($userData);
        $user = User::where('email',$request->email)->first();

        return response()->json([
            'user'  => $user,
            'token' => $user->createToken(time())->plainTextToken,
        ], 200);
    }



    // Categories





}