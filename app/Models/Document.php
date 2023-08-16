<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory, ImageTrait;

    protected $table = "documents";

    protected $fillable = [
        "title",
        "image",
        "status",
    ];
}
