<?php

namespace App\Models;

use App\Traits\ImageTrait;
use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, SeoTrait, ImageTrait;

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

}

