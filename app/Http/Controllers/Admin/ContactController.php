<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            $settingsMedia = Setting::query()->where("group_key", "contact_settings")->get();
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
    public function store(ContactRequest $request)
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            Setting::query()->where("key", "contact_phone")->update(["value" => $request->get("contact_phone")]);
            Setting::query()->where("key", "contact_title")->update(["value" => $request->get("contact_title")]);
            Setting::query()->where("key", "contact_fax")->update(["value" => $request->get("contact_fax")]);
            Setting::query()->where("key", "contact_email")->update(["value" => $request->get("contact_email")]);
            Setting::query()->where("key", "contact_address")->update(["value" => $request->get("contact_address")]);

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
