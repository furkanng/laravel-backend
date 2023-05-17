<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {

            $pages = Page::query()->get();

            return response()->json([
                "status" => true,
                "message" => "success",
                "data" => $pages
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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {

            $page = new Page();
            $page->title = $request->get("title");
            $page->description = $request->get("description");
            $page->image = $request->file("image");
            $page->status = $request->get("status", true);

            $image = $page->image;

            if (isset($image)) {
                $filename = $page->title . "." . $image->getClientOriginalExtension();
                $image->storeAs("/page", $filename);
                $page->image = $filename;
            }

            $result = $page->save();

            if ($result) {
                return response()->json([
                    "status" => true,
                    "message" => "page added",
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "page not added",
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
            $data = Page::findOrFail($id);

            return response()->json([
                "status" => true,
                "message" => "success",
                "data" => $data
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
    public function update($id, PageRequest $request)
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $data = Page::findOrFail($id);

            $data->title = $request->input("title");
            $data->description = $request->input("description");
            $data->image = $request->file("image");
            $data->status = $request->input("status", true);

            $image = $data->image;

            if (isset($image)) {
                $filename = $data->title . "." . $image->getClientOriginalExtension();
                $image->storeAs("/page", $filename);
                $data->image = $filename;
            }


            $result = $data->save();

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
    public function destroy(Request $request, string $id)
    {
    }
}
