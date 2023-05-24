<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SssRequest;
use App\Models\Bulletin;
use App\Models\Sss;
use Illuminate\Http\Request;

class SssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $user;
    public function __construct()
    {
       $this->user = auth()->guard('admin-api')->user();


    }

    public function index()
    {


        if($this->user){
            $data  = Sss::query()->orderBy("id","DESC")->get();

            return response()->json([
                "status"=>true,
                "message" => "success",
                "data"=>$data
            ]);

        }
        else{
            return response()->json([
               "status"=>false,
               "message"=>"User not found"
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
    public function store(SssRequest $request)
    {
        if($this->user){
            $data = new Sss();

            $data->question = $request->get('question');
            $data->answer = $request->get('answer');
            $data->status = $request->get('status',true);

            $result = $data->save();

            if($result){
                return response()->json([
                   "status"=>true,
                   "message"=>"success added sss"
                ]);
            }
            else{
                return response()->json([
                   "status"=>false,
                   "message"=>"error added sss"
                ],401);


            }
        }
        else{
            return response()->json([
               "status"=>false,
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
        if($this->user){
            $data = Sss::findOrFail($id);

            return response()->json([
                "status"=>true,
                "message"=>"success",
                "data"=>$data
            ]);

        }
        else{
            return response()->json([
               "status"=>false,
               "message"=>"User not found"
            ]);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SssRequest $request, string $id)
    {
        if($this->user){
            $data = Sss::findOrFail($id);

            $question = $request->get('question');
            $answer = $request->get('answer');
            $status =  $request->get('status');

            if(isset($question)){
                $data->question = $question;
            }
            if(isset($answer)){
                $data->answer = $answer;
            }
            if(isset($status)){
                $data->status = $status;
            }

            $result = $data->save();
            if($result){
                return response()->json([
                   "status"=>true,
                   "message"=>"success added data",

                ]);
            }
            else{
                return response()->json([
                    "status"=>false,
                    "message"=>"error added data",

                ]);
            }


        }
        else{
            return response()->json([
                "status"=>false,
                "message"=>"User not found"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($this->user){

            $sss = Sss::findOrFail($id);

            $result = $sss->delete();
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
