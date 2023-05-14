<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "package";

    protected $fillable = [
        "id",
        "title",
        "price",
        "description",
        "period",
        "status",
    ];
}
