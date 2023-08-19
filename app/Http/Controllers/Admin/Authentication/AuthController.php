<?php

namespace App\Http\Controllers\Admin\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminRegisterRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin-api', ['except' => ['login', 'register']]);
    }

    public function register(AdminRegisterRequest $request)
    {
        $model = new Admin();

        $model->name = $request->name;
        $model->surname = $request->surname;
        $model->email = $request->email;
        $model->password = Hash::make($request->password);

        $result = $model->save();

        if ($result) {
            return response()->json([
                "status" => true,
                "message" => "User Registered Successfully",
                "data" => $model,
            ]);
        } else {
            return response()->json([
                "status" => false,
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
                "status" => false,
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
        return response()->json([
            "status" => true,
            "message" => "User successfully logout"
        ]);
    }
}
