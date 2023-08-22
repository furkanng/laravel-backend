<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
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
        return response()->api(SubCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "category_id" => "required",
        ]);
        $model = new SubCategory();
        $model->fill(request()->all())->save();
        return response()->api($model);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = SubCategory::findOrFail($id);
        return response()->api($model, ["category", "subsubcategory"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required|sometimes",
            "category_id" => "required|sometimes",
        ]);
        $model = SubCategory::findOrFail($id);
        $model->fill(request()->all())->save();
        return response()->api($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = SubCategory::findOrFail($id);
        $model->delete();
        return response()->api($model);
    }
}
