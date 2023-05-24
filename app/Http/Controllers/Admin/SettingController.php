<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FtpControl;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $settingsMedia = Setting::query()->where("group_key", "general_settings")->get();
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
    public function store(SettingRequest $request)
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $settingsMedia = Setting::query()->where("group_key", "general_settings")->get();
            $data = [];

            foreach ($settingsMedia as $key) {
                $data[$key['key']] = $key['value'];
            }

            $footer_logo = $request->file("site_footer_logo");
            $description = $request->get("site_description");
            $keyword = $request->get("site_keywords");
            $title = $request->get("site_title");
            $favicon = $request->file("site_favicon");
            $logo = $request->file("site_logo");

            Setting::query()->where("key", "site_description")->update(["value" => $description]);
            Setting::query()->where("key", "site_keywords")->update(["value" => $keyword]);
            Setting::query()->where("key", "site_title")->update(["value" => $title]);


            if (isset($footer_logo) && FtpControl::FtpLicanceControl()) {
                $filename = "FooterLogo" . "." . $footer_logo->getClientOriginalExtension();
                $footer_logo->storeAs("/setting", $filename);
                Setting::query()->where("key", "site_footer_logo")->update(["value" => $filename]);
            }

            if (isset($favicon) && FtpControl::FtpLicanceControl()) {
                $filename = "Favicon" . "." . $favicon->getClientOriginalExtension();
                $favicon->storeAs("/setting", $filename);
                Setting::query()->where("key", "site_favicon")->update(["value" => $filename]);
            }

            if (isset($logo) && FtpControl::FtpLicanceControl()) {
                $filename = "Logo" . "." . $logo->getClientOriginalExtension();
                $logo->storeAs("/setting", $filename);
                Setting::query()->where("key", "site_logo")->update(["value" => $filename]);
            }

            return response()->json([
                "status" => true,
                "message" => "success"
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
