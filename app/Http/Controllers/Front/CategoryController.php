<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getCategory()
    {
        $category = Category::query()->orderBy("id","DESC")->get();

        if($category->isNotEmpty()){
            return response()->json([
               "status"=>true,
               "message"=>"success get category",
                "data"=>$category
            ]);
        }
        else{
            return response()->json([
               "status"=>false,
               "message"=>"error getting category"
            ]);
        }
    }
    public function getSubCategory(){
        $sub_category = SubCategory::query()->orderBy('id',"DESC")->get();
        if($sub_category->isNotEmpty()){
            return response()->json([
                "status"=>true,
                "message"=>"success get sub category",
                "data"=>$sub_category
            ]);
        }
        else{
            return response()->json([
                "status"=>false,
                "message"=>"error getting sub category"
            ]);
        }
    }

    public function getSubCatyWithCatId($catId){

        $sub_category = SubCategory::query()->where('category_id',$catId)->orderBy('id','DESC')->get();

        if($sub_category->isNotEmpty()){
            return response()->json([
                "status"=>true,
                "message"=>"success get sub category",
                "data"=>$sub_category
            ]);
        }
        else{
            return response()->json([
                "status"=>false,
                "message"=>"error getting sub category"
            ]);
        }
    }




}
