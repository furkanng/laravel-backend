<?php

namespace App\Models;

use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory, SeoTrait;

    protected $table = "package";

    protected $fillable = [
        "title",
        "price",
        "description",
        "period",
        "seo_link",
        "seo_title",
        "seo_description",
        "seo_keywords",
        "status",
    ];
}
