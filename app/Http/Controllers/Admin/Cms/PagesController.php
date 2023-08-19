<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
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
        return response()->api(Page::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
        ]);
        $model = new Page();
        $model->fill(request()->all())->save();
        return response()->api($model);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Page::findOrFail($id);
        return response()->api($model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => "required|sometimes",
        ]);
        $model = Page::findOrFail($id);
        $model->fill(request()->all())->save();
        return response()->api($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Page::findOrFail($id);
        $model->delete();
        return response()->api($model);
    }
}
