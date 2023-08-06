<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Response::macro('api', function ($model = null, $relation = []) {

            $relationData = [];
            foreach ($relation as $key) {
                $relationData[$key] = $model->$key;
            }

            if (!empty($model) || $model == "true") {

                return response()->json([
                    "status" => true,
                    "message" => "Transaction Successful",
                    "data" => $model
                ]);

            } else {
                return response()->json([
                    "status" => false,
                    "message" => "Transaction Failed",
                    "data" => $model
                ]);
            }
        });
    }
}
