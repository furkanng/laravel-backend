<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sss extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "sss";

    protected $fillable = [
        "title",
        "content",
        "status"
    ];
}
