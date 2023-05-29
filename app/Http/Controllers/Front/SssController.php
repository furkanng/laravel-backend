<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Sss;
use Illuminate\Http\Request;

class SssController extends Controller
{
    public function getSss(){
        $data = Sss::query()->where("status",1)->orderBy('id','DESC')->get();

        if($data->isNotEmpty()){
            return response()->json([
                "status"=>true,
                "message"=>"success get sss",
                "data"=>$data
            ]);
        }
        else{
            return response()->json([
                "status"=>false,
                "message"=>"error getting sss"
            ]);
        }
    }
}
