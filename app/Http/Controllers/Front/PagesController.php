<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getPages(){

        $pages = Page::query()->orderBy('id','DESC')->get();

        if($pages->isNotEmpty()){
            return response()->json([
               "status"=>true,
                "message"=>"success get page",
                "data"=>$pages
            ]);
        }
        else{
            return response()->json([
                "status"=>false,
                "message"=>"error get page",

            ]);
        }
    }
}
