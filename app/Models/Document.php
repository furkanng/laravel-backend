<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "documents";

    protected $fillable = [
        "id",
        "title",
        "image",
        "status",
    ];
}
