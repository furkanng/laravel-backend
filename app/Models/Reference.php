<?php

namespace App\Models;

use App\Traits\ImageTrait;
use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory, ImageTrait, SeoTrait;

    protected $table = "references";

    protected $fillable = [
        "title",
        "image",
        "seo_link",
        "status"
    ];
}
