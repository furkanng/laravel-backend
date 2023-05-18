<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontLoginRequest;
use App\Http\Requests\FrontRegisterRequest;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);

    }

    public function register(FrontRegisterRequest $req)
    {

        $user = new User();

        $user->name = $req->name;
        $user->surname = $req->surname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->birth_date = $req->birth_date;

        $result = $user->save();

        if ($result) {
            return response()->json([
                "status" => true,
                "message" => "User created successfully",
                "data" => $user
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "User created not successfully"
            ], 401);
        }
    }

    public function login(FrontLoginRequest $req)
    {
        $credentials = $req->only('email', 'password');
        $token = auth()->guard('api')->attempt($credentials);

        if (!$token) {
            return response()->json([
                "status" => false,
                "message" => "Token can not create"
            ]);
        }

        return response()->json([
            "access_token" => $token,
            "token_type" => "bearer",
            "expires_in" => auth()->factory()->getTTL() * 60,
            "user" => auth()->guard('api')->user()

        ]);
    }

    public function logout()
    {
        auth()->logout();
        response()->json([
            "status" => true,
            "message" => "User successfully logout"
        ]);
    }

}
