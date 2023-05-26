<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct(){
        $product = Product::query()->orderBy('id','DESC')->get();

        if($product->isNotEmpty()){
            return response()->json([
                "status"=>true,
                "message"=>"success get product",
                "data"=>$product
            ]);
        }
        else{
            return response()->json([
                "status"=>false,
                "message"=>"error get product",

            ]);
        }

    }

    public function getProductCatId($catId){
        $product = Product::query()->where('category_id',$catId)->orderBy('id','DESC')->get();

        if($product->isNotEmpty()){
            return response()->json([
                "status"=>true,
                "message"=>"success get product",
                "data"=>$product
            ]);
        }
        else{
            return response()->json([
                "status"=>false,
                "message"=>"error get product",

            ]);
        }
    }

    public  function getProductSubCatId($subCatId){
        $product = Product::query()->where('subcategory_id',$subCatId)->orderBy('id','DESC')->get();

        if($product->isNotEmpty()){
            return response()->json([
                "status"=>true,
                "message"=>"success get product",
                "data"=>$product
            ]);
        }
        else{
            return response()->json([
                "status"=>false,
                "message"=>"error get product",

            ]);
        }
    }
}
