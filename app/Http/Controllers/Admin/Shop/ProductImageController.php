<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->api(ProductImage::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "product_id" => "required",
            "images" => "required",
        ]);
        $product = Product::findOrFail($request->product_id)->name;
        $images = $request->file("images");
        if (isset($images)) {
            foreach ($images as $image) {
                $filename = Str::slug($product, "-", "tr") . "-" . rand(1, 500) . "." . $image->getClientOriginalExtension();
                $image->storeAs("productImages", $filename);
                $model = new ProductImage();
                $model->product_id = $request->product_id;
                $model->images = $filename;
                $model->save();
            }
        }
        return response()->api($model);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = ProductImage::findOrFail($id);
        return response()->api($model, ["product"]);
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
        $model = ProductImage::findOrFail($id);
        Storage::delete("productImages/" . $model->getOriginal("images"));
        $model->delete();
        return response()->api($model);
    }
}
