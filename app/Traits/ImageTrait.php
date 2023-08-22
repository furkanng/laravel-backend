<?php

namespace App\Traits;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageTrait
{
    public static function bootImageTrait()
    {
        static::creating(function ($model) {
            self::createMapper($model);
        });

        static::updating(function ($model) {
            self::updateMapper($model);
        });

        static::deleting(function ($model) {
            self::deleteMapper($model);
        });
    }


    public static function createMapper($model)
    {
        if (Schema::hasColumn($model->table, "title")) {
            $image = $model->image;
            if (isset($image)) {
                $filename = Str::slug($model->title, "-", "tr") . "-" . rand(1, 500) . "." . $image->getClientOriginalExtension();
                $image->storeAs($model->table, $filename);
                $model->image = $filename;
            }
        } elseif (Schema::hasColumn($model->table, "name")) {
            $image = $model->image;
            if (isset($image)) {
                $filename = Str::slug($model->name, "-", "tr") . "-" . rand(1, 500) . "." . $image->getClientOriginalExtension();
                $image->storeAs($model->table, $filename);
                $model->image = $filename;
            }
        }
    }

    public static function updateMapper($model)
    {
        if ($model->getAttribute("image") != $model->getOriginal("image")) {
            if (Schema::hasColumn($model->table, "title")) {
                $image = $model->image;
                if (isset($image)) {
                    Storage::delete($model->table . "/" . $model->getOriginal("image"));
                    $filename = Str::slug($model->title, "-", "tr") . "-" . rand(1, 500) . "." . $image->getClientOriginalExtension();
                    $image->storeAs($model->table, $filename);
                    $model->image = $filename;
                }
            } elseif (Schema::hasColumn($model->table, "name")) {
                $image = $model->image;
                if (isset($image)) {
                    Storage::delete($model->table . "/" . $model->getOriginal("image"));
                    $filename = Str::slug($model->name, "-", "tr") . "-" . rand(1, 500) . "." . $image->getClientOriginalExtension();
                    $image->storeAs($model->table, $filename);
                    $model->image = $filename;
                }
            }
        }
    }

    public static function deleteMapper($model)
    {
        $image = $model->image;
        if (isset($image)) {
            Storage::delete($model->table . "/" . $model->getOriginal("image"));
        }
    }
}
