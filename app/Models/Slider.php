<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory, ImageTrait;

    protected $table = "slider";

    protected $fillable = [
        "title",
        "image",
        "url",
        "position",
        "status"
    ];
}
