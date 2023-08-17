<?php

namespace App\Models;

use App\Traits\ImageTrait;
use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory, ImageTrait, SeoTrait;

    protected $table = "brands";

    protected $fillable = [
        "name",
        "image",
        "showcase",
        "seo_link",
        "seo_title",
        "seo_description",
        "seo_keywords",
        "status",
    ];
}
