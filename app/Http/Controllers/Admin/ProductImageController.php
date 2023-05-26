<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function removeImage(Request $request)
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $images = $request->get("images");

            $image = ProductImage::query()->where("images", $images)->first();

            if ($image) {
                Storage::disk("ftp")->delete("product/" . $image->images);
                $image->delete();
                return response()->json([
                    "status" => true,
                    "message" => "success"
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "image not found"
                ]);
            }
        } else {
            return response()->json([
                "status" => false,
                "message" => "User not found"
            ]);
        }
    }

    public function removeCoverImage(Request $request)
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $images = $request->get("cover_image");

            $image = Product::query()->where("cover_image", $images)->first();

            if ($image) {
                Storage::disk("ftp")->delete("product/" . $image->cover_image);
                Product::query()->where("cover_image", $image->cover_image)->update(["cover_image" => null]);
                return response()->json([
                    "status" => true,
                    "message" => "success"
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "image not found"
                ]);
            }
        } else {
            return response()->json([
                "status" => false,
                "message" => "User not found"
            ]);
        }
    }
}
