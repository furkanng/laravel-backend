<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminRegisterRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin-api', ['except' => ['login', 'register']]);
    }

    public function register(AdminRegisterRequest $request)
    {
        $user = new Admin();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $result = $user->save();

        if ($result) {
            return response()->json([
                "status" => "success",
                "message" => "User Registered Successfully",
                "data" => $user,
            ]);
        } else {
            return response()->json([
                "status" => "fail",
                "message" => "User Registered Not Successfully",
            ], 401);
        }
    }

    public function login(AdminLoginRequest $request)
    {
        $credentials = $request->only("email", "password");
        $token = \auth()->guard("admin-api")->attempt($credentials);

        if (!$token) {
            return response()->json([
                "status" => "error",
                "message" => "Login Failed"
            ]);
        }

        return $this->respondWithToken($token);
    }

    public function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            "user" => auth()->guard("admin-api")->user(),
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
}
