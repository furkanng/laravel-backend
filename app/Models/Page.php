<?php

namespace App\Models;

use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory, SeoTrait;

    protected $table = "pages";

    protected $fillable = [
        "title",
        "content",
        "image",
        "seo_link",
        "seo_title",
        "seo_description",
        "seo_keywords",
        "status",
    ];

    public static function booted()
    {
        static::creating(function ($model) {
            $image = $model->image;
            if (isset($image)) {
                $filename = Str::slug($model->title, "-") . "." . $image->getClientOriginalExtension();
                $image->storeAs("page", $filename);
                $model->image = $filename;
            }

        });

        static::updating(function ($model) {
            $image = $model->image;
            if (isset($image)) {
                Storage::delete("page/" . $model->getOriginal("image"));
                $filename = Str::slug($model->title, "-") . "." . $image->getClientOriginalExtension();
                $image->storeAs("page", $filename);
                $model->image = $filename;
            }
        });

        static::deleting(function ($model) {
            $image = $model->image;
            if (isset($image)) {
                Storage::delete("page/" . $model->getOriginal("image"));
            }
        });
    }

}

