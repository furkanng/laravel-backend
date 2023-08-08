<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
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

        });

        static::updating(function ($model) {

        });
    }
}
