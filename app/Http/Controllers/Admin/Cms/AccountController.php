<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->api(Account::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "bank_name" => "required",
            "name" => "required",
        ]);
        $model = new Account();
        $model->fill(request()->all())->save();
        return response()->api($model);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Account::findOrFail($id);
        return response()->api($model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "bank_name" => "sometimes|required",
            "name" => "sometimes|required",
        ]);
        $model = Account::findOrFail($id);
        $model->fill(request()->all())->save();
        return response()->api($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Account::findOrFail($id);
        $model->delete();
        return response()->api($model);
    }
}
