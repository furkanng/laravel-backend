<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
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
        return response()->api(SubSubCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "sub_category_id" => "required",
        ]);
        $model = new SubSubCategory();
        $model->fill(request()->all())->save();
        return response()->api($model);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = SubSubCategory::findOrFail($id);
        return response()->api($model, ["subcategory"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required|sometimes",
            "sub_category_id" => "required|sometimes",
        ]);
        $model = SubSubCategory::findOrFail($id);
        $model->fill(request()->all())->save();
        return response()->api($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = SubSubCategory::findOrFail($id);
        $model->delete();
        return response()->api($model);
    }
}
