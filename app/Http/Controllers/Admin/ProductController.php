<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FtpControl;
use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
