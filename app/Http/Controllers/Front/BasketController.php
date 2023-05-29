<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Product;
use App\Models\User;
use App\Models\Variant;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function getBasket()
    {
        $user = auth()->guard("api")->user();

        if ($user) {

            $basket = Basket::query()->where("user_id", $user->id)->get();
            //todo düzenlecenek

            if ($basket->isNotEmpty()) {
                return response()->json([
                    "status" => true,
                    "message" => "success",
                    "data" => $basket
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "basket is empty",
                ]);
            }

        } else {
            return response()->json([
                "status" => false,
                "message" => "user not found"
            ]);
        }

    }

    public function addBasket(Request $request)
    {
        $user = auth()->guard("api")->user();

        if ($user) {
            $productId = $request->get("product_id");
            $variantId = $request->get("variant_id");
            $piece = $request->get("piece");

            $product = Product::findOrFail($productId);

            $price = $product->price;

            $productPrice = $price * $piece;

            $basket = new Basket();
            $basket->user_id = $user->id;
            $basket->product_id = $productId;
            $basket->variant_id = $variantId;
            $basket->piece = $piece;
            $basket->price = $productPrice;

            $result = $basket->save();

            if ($result) {
                return response()->json([
                    "status" => true,
                    "message" => "product added"
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "product not added"
                ]);
            }
        } else {
            return response()->json([
                "status" => false,
                "message" => "user not found"
            ]);
        }
    }
}
