<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Variant;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {

            $data = Feature::query()->orderBy("id", "DESC")->get();

            return response()->json([
                "status" => true,
                "message" => "success",
                "data" => $data,
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
            $data = new Feature();
            $data->name = $request->get("name");
            $data->status = $request->get("status", true);

            $result = $data->save();

            if ($result) {
                return response()->json([
                    "status" => true,
                    "message" => "feature added",
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "feature not added",
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
            $data = Variant::findOrFail($id);

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
            $data = Feature::findOrFail($id);

            $name = $request->get("name");
            $status = $request->get("status");

            if (isset($name)) {
                $data->name = $name;
            }

            if (isset($status)) {
                $data->status = $status;
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
            $page = Feature::findOrFail($id);

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
