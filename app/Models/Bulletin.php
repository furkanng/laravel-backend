<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "bulletin";

    public $timestamps = false;
    protected $fillable = [
        "id",
        "email",
        "date",
        "ip",
    ];
}
