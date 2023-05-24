<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function getBasket()
    {


    }

    public function addBasket(Request $request)
    {
        $productId = $request->get("id");
        $variantId = json_decode($request->get("variant_id"));

        foreach ($variantId as $key) {
            $variant[] = Variant::query()->where("id", $key)->get();
        }
        $product = Product::findOrFail($productId);
    }
}
