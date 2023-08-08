<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\MailRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $settingsMedia = Setting::query()->where("group_key", "email_settings")->get();
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
    public function store(MailRequest $request)
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            Setting::query()->where("key", "mailer_encryption")->update(["value" => $request->get("mailer_encryption")]);
            Setting::query()->where("key", "mailer_host")->update(["value" => $request->get("mailer_host")]);
            Setting::query()->where("key", "mailer_password")->update(["value" => $request->get("mailer_password")]);
            Setting::query()->where("key", "mailer_username")->update(["value" => $request->get("mailer_username")]);
            Setting::query()->where("key", "mailer_port")->update(["value" => $request->get("mailer_port")]);
            Setting::query()->where("key", "mailer_from_name")->update(["value" => $request->get("mailer_from_name")]);
            Setting::query()->where("key", "mailer_from_address")->update(["value" => $request->get("mailer_from_address")]);
            Setting::query()->where("key", "mailer_driver")->update(["value" => $request->get("mailer_driver")]);

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
