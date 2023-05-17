<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "pages";
    public $timestamps = false;

    protected $fillable = [
        "id",
        "title",
        "description",
        "status",
        "image"
    ];
}
