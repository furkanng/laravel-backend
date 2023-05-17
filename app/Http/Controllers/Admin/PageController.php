<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function update($id, Request $request)
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
}
