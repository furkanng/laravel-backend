<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SMediaRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $settingsMedia = Setting::query()->where("group_key", "socialMedia_settings")->get();
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
    public function store(SMediaRequest $request)
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            Setting::query()->where("key", "media_youtube")->update(["value" => $request->get("media_youtube")]);
            Setting::query()->where("key", "media_facebook")->update(["value" => $request->get("media_facebook")]);
            Setting::query()->where("key", "media_twitter")->update(["value" => $request->get("media_twitter")]);
            Setting::query()->where("key", "media_instagram")->update(["value" => $request->get("media_instagram")]);
            Setting::query()->where("key", "media_linkedin")->update(["value" => $request->get("media_linkedin")]);

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
