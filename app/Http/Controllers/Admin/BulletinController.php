<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BulletinRequest;
use App\Models\Bulletin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->guard("admin-api")->user();

        if ($user){

            $data = Bulletin::query()->orderBy("id","DESC")->get();

            return response()->json([
               "status"=>true,
               "message"=>"success",
               "data"=>$data
            ]);
        }
        else{
            return response()->json([
               "status"=>false,
               "message"=>"user not found"
            ]);
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BulletinRequest $request)
    {
        $user = auth()->guard('admin-api')->user();


        if($user){

            $bulletin = new Bulletin();
            $bulletin->email = $request->get('email');
            $bulletin->date = Carbon::now();
            $bulletin->ip = request()->ip();

            $result = $bulletin->save();

            if($result){
                return response()->json([
                    "status"=>true,
                    "message"=>"success saved bulletin"
                ]);
            }
            else{
                return response()->json([
                    "status"=>false,
                    "messsage"=>"error saved bulletin"
                ]);
            }

        }
        else{
            return response()->json([
               "status"=>true,
               "message"=>"User not found"
            ]);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->guard('admin-api')->user();

        if ($user){
            $data = Bulletin::findOrFail($id);

            return response()->json([
                "status"=>true,
                "message"=>"success",
                "data"=>$data
            ]);
        }
        else{
            return  response()->json([
               "status"=>false,
               "message"=>"User not found"
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BulletinRequest $request, string $id)
    {
        $user = auth()->guard("admin-api")->user();

        if($user){
            $bulletin = Bulletin::findOrFail($id);

            $email = $request->get('email');
            $date = Carbon::now();
            $ip = request()->ip();
            if(isset($email)){
                $bulletin->email = $email;
            }
            if(isset($date)){
                $bulletin->date = $date;
            }
            if(isset($ip)){
                $bulletin->ip = $ip;
            }

            $result = $bulletin->save();
            if($result){
                return response()->json([
                    "status"=>true,
                    "message"=>"success",
                    "email"=>$email
                ]);
            }
            else{
                return  response()->json([
                   "status"=>false,
                   "message"=>"error saved bulletin"
                ],401);
            }

        }
        else {
            return response()->json([
                "status" => false,
                "message" => "User not found"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->guard("admin-api")->user();
        if($user){

            $bulletin = Bulletin::findOrFail($id);

            $result = $bulletin->delete();
            if ($result) {
                return response()->json([
                    "status" => true,
                    "message" => "success",
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "error",
                ], 401);
            }
        }
        else {
            return response()->json([
                "status" => false,
                "message" => "User not found"
            ]);
        }
    }
}
