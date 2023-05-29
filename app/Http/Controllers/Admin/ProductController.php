<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FtpControl;
use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Variant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {

            $product = Product::query()->orderBy("id", "DESC")->get();

            return response()->json([
                "status" => true,
                "message" => "success",
                "data" => $product,
            ]);

        } else {
            return response()->json([
                "status" => false,
                "message" => "User not found"
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {

            $variants = Variant::with('feature')->get();

            $result = [];

            foreach ($variants as $variant) {
                $feature = $variant->feature;

                $variantData = [
                    'variant_id' => $variant->id,
                    'variant_name' => $variant->name,
                ];

                if (!isset($result[$feature->id])) {
                    $result[$feature->id] = [
                        'feature_id' => $feature->id,
                        'feature_name' => $feature->name,
                        'variants' => [],
                    ];
                }

                $result[$feature->id]['variants'][] = $variantData;
            }

            if ($result) {
                return response()->json([
                    "status" => true,
                    "message" => "success",
                    "data" => $result
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "error",
                ], 401);
            }


        } else {
            return response()->json([
                "status" => false,
                "message" => "User not found"
            ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $data = new Product();
            $data->title = $request->get("title");
            $data->price = $request->get("price");
            $data->stock = $request->get("stock");
            $data->code = $request->get("code");
            $data->date = Carbon::now();
            $data->description = $request->get("description");
            $data->cover_image = $request->file("cover_image");
            $data->new_product = $request->get("new_product", false);
            $data->spot_text = $request->get("spot_text");
            $data->status = $request->get("status", true);
            $data->category_id = $request->get("category_id");
            $data->subcategory_id = $request->get("subcategory_id");
            $data->feature_id = $request->get("feature_id");
            $data->variant_id = $request->get("variant_id");

            if ($data->code == null) {
                $code = Helper::generateRandomCode(7, true, true, false, false);
                $data->code = $code;
            }

            $coverImage = $data->cover_image;

            if (isset($coverImage) && FtpControl::FtpLicanceControl()) {
                $filename = $data->code . "." . $coverImage->getClientOriginalExtension();
                $coverImage->storeAs("/product", $filename);
                $data->cover_image = $filename;
            }

            $result = $data->save();

            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $file) {
                    $image = new ProductImage();
                    $filename = $data->code . "-" . rand(1, 99) . "." . $file->getClientOriginalExtension();
                    $file->storeAs("/product", $filename);
                    $image->images = $filename;
                    $image->product_id = $data->id;
                    $image->save();
                }
            }

            if ($result) {
                return response()->json([
                    "status" => true,
                    "message" => "product added",
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "product not added",
                ], 401);
            }


        } else {
            return response()->json([
                "status" => false,
                "message" => "User not found"
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
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $product = Product::findOrFail($id);

            $productImages = ProductImage::query()->where("product_id", $id)->get();

            $images = [];

            foreach ($productImages as $key) {
                $images[$key["id"]] = $key->images;
            }

            $product->images = $images;

            $variants = Variant::with('feature')->get();

            $result = [];

            foreach ($variants as $variant) {
                $feature = $variant->feature;

                $variantData = [
                    'variant_id' => $variant->id,
                    'variant_name' => $variant->name,
                ];

                if (!isset($result[$feature->id])) {
                    $result[$feature->id] = [
                        'feature_id' => $feature->id,
                        'feature_name' => $feature->name,
                        'variants' => [],
                    ];
                }

                $result[$feature->id]['variants'][] = $variantData;
            }

            return response()->json([
                "status" => true,
                "product" => $product,
                "features" => $result,
            ]);

        } else {
            return response()->json([
                "status" => false,
                "message" => "User not found"
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {//TODO çalışıyor gibi ama çalışmıyor da olabilir kontrol etmek lazım  x-www-form-urlencoded ile
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $product = Product::findOrFail($id);

            $title = $request->get("title");
            $price = $request->get("price");
            $stock = $request->get("stock");
            $code = $request->get("code");
            $description = $request->get("description");
            $new_product = $request->get("new_product");
            $spot_text = $request->get("spot_text");
            $status = $request->get("status");
            $category_id = $request->get("category_id");
            $subcategory_id = $request->get("subcategory_id");
            $feature_id = $request->get("feature_id");
            $variant_id = $request->get("variant_id");
            $cover_image = $request->file("cover_image");

            if (isset($cover_image) && FtpControl::FtpLicanceControl()) {
                $filename = $product->code . "." . $cover_image->getClientOriginalExtension();
                $cover_image->storeAs("/product", $filename);
                $product->cover_image = $filename;
            }

            if (isset($title)) {
                $product->title = $title;
            }

            if (isset($price)) {
                $product->price = $price;
            }

            if (isset($stock)) {
                $product->stock = $stock;
            }

            if (isset($code)) {
                $product->code = $code;
            }

            if (isset($description)) {
                $product->description = $description;
            }

            if (isset($new_product)) {
                $product->new_product = $new_product;
            }

            if (isset($spot_text)) {
                $product->spot_text = $spot_text;
            }

            if (isset($status)) {
                $product->status = $status;
            }

            if (isset($category_id)) {
                $product->category_id = $category_id;
            }

            if (isset($subcategory_id)) {
                $product->subcategory_id = $subcategory_id;
            }

            if (isset($feature_id)) {
                $product->feature_id = $feature_id;
            }

            if (isset($variant_id)) {
                $product->variant_id = $variant_id;
            }

            $result = $product->save();

            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $file) {
                    $image = new ProductImage();
                    $filename = $product->code . "-" . rand(1, 99) . "." . $file->getClientOriginalExtension();
                    $file->storeAs("/product", $filename);
                    $image->images = $filename;
                    $image->product_id = $product->id;
                    $image->save();
                }
            }

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

        } else {
            return response()->json([
                "status" => false,
                "message" => "User not found"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $product = Product::findOrFail($id);

            if ($product->cover_image > 0) {
                Storage::disk("ftp")->delete("product/" . $product->cover_image);
            }

            $productImages = ProductImage::query()->where("product_id", $product->id)->get();

            if ($productImages) {
                foreach ($productImages as $image) {
                    Storage::disk("ftp")->delete("product/" . $image->images);
                    $image->delete();
                }

            }

            $result = $product->delete();

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

        } else {
            return response()->json([
                "status" => false,
                "message" => "User not found"
            ]);
        }
    }
}
