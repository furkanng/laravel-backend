<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Namshi\JOSE\JWT;
use PHPOpenSourceSaver\JWTAuth\JWTAuth;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api',['except'=>['login','register']]);
    }
    public function  register(Request $req){
            //todo validate

        $user = User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>Hash::make($req->password)
        ]);


        return response()->json([
            'status'=>'success',
            'message'=>'User created successfully',
            'data'=>$user,

        ]);

    }

    public function login(Request $req){

        $user = $req->only('email','password');

        $token = Auth::attempt($user);

        if(!$token){
            return response()->json('error');
        }
        else{
            return response()->json([
                'status'=>'success',
                'token'=>$token,
                'user'=>Auth::user()
            ]);
        }

    }
}
