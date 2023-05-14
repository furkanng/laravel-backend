<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "branches";

    protected $fillable = [
        "id",
        "name",
        "address",
        "status",
        "phone",
        "gsm",
        "email",
        "city",
        "district"
    ];
}
