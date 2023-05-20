<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FtpControl;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {
            //Son veriye göre sırala
            $data = Document::query()->orderBy("id", "DESC")->get();

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
    public function store(DocumentRequest $request)
    {
        $user = auth()->guard("admin-api")->user();

        if ($user) {

            $data = new Document();
            $data->title = $request->get("title");
            $data->image = $request->file("image");
            $data->status = $request->get("status", true);

            $image = $data->image;

            if (isset($image) && FtpControl::FtpLicanceControl()) {
                $filename = $data->title . "." . $image->getClientOriginalExtension();
                $image->storeAs("/document", $filename);
                $data->image = $filename;
            }

            $result = $data->save();

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
            $data = Document::findOrFail($id);

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
            $data = Document::findOrFail($id);

            $title = $request->get("title");
            $image = $request->file("image");
            $status = $request->get("status");

            //gelen veri varsa update ediyor yoksa eski veriler kalıyor
            if (isset($title)) {
                $data->title = $title;
            }

            if (isset($status)) {
                $data->status = $status;
            }

            //ftp ye resmim yüklüyor. veritabanına title ile aynı isimde resim yolu yazıyor. böyle yap silerken lazım olucak.
            if (isset($image) && FtpControl::FtpLicanceControl()) {
                $filename = $data->title . "." . $image->getClientOriginalExtension();
                $image->storeAs("/document", $filename);
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
            $data = Document::findOrFail($id);

            //veriyi silerken aynı zamanda ftp deki resim varsa onu da silmeye yarıyor.
            if ($data->image > 0) {
                Storage::disk("ftp")->delete("document/" . $data->image);
            }


            $result = $data->delete();

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
