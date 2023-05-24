<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $settingsMedia = Setting::query()->where("group_key", "api_settings")->get();
            $data = [];

            foreach ($settingsMedia as $key) {
                $data[$key['key']] = $key['value'];
            }

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
            Setting::query()->where("key", "whatsapp_api")->update(["value" => $request->get("whatsapp_api")]);
            Setting::query()->where("key", "phone_api")->update(["value" => $request->get("phone_api")]);
            Setting::query()->where("key", "analytics_api")->update(["value" => $request->get("analytics_api")]);
            Setting::query()->where("key", "webmaster_api")->update(["value" => $request->get("webmaster_api")]);
            Setting::query()->where("key", "map_api")->update(["value" => $request->get("map_api")]);
            Setting::query()->where("key", "livesupport_api")->update(["value" => $request->get("livesupport_api")]);
            Setting::query()->where("key", "rcaptha_api")->update(["value" => $request->get("rcaptha_api")]);

            return response()->json([
                "status" => true,
                "message" => "success",
            ]);

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
