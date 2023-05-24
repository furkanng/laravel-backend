<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FtpControl;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {

            $category = Category::query()->orderBy("id", "DESC")->get();

            return response()->json([
                "status" => true,
                "message" => "success",
                "data" => $category,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $data = new Category();
            $data->name = $request->get("name");
            $data->image = $request->file("image");
            $data->status = $request->get("status", true);

            $image = $data->image;

            if (isset($image) && FtpControl::FtpLicanceControl()) {
                $filename = $data->name . "." . $image->getClientOriginalExtension();
                $image->storeAs("/category", $filename);
                $data->image = $filename;
            }

            $result = $data->save();

            if ($result) {
                return response()->json([
                    "status" => true,
                    "message" => "category added",
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "category not added",
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
            $data = Category::findOrFail($id);

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
    public function update(Request $request, string $id)
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $data = Category::findOrFail($id);

            $name = $request->get("name");
            $image = $request->file("image");
            $status = $request->get("status");

            if (isset($name)) {
                $data->name = $name;
            }

            if (isset($status)) {
                $data->status = $status;
            }

            if (isset($image) && FtpControl::FtpLicanceControl()) {
                $filename = $data->title . "." . $image->getClientOriginalExtension();
                $image->storeAs("/category", $filename);
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
    public function destroy(string $id)
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $page = Category::findOrFail($id);

            if ($page->image > 0) {
                Storage::disk("ftp")->delete("category/" . $page->image);
            }

            $result = $page->delete();

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
