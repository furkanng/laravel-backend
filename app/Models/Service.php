<?php

namespace App\Models;

use App\Traits\ImageTrait;
use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, ImageTrait, SeoTrait;

    protected $table = "services";

    protected $fillable = [
        "title",
        "content",
        "image",
        "seo_link",
        "status"
    ];
}
