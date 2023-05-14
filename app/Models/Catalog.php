<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "catalog";

    protected $fillable = [
        "id",
        "title",
        "image",
        "document",
        "status",
    ];

}
