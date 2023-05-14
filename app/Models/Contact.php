<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "contact";

    protected $fillable = [
        "id",
        "address",
        "work_hours",
        "phone",
        "fax",
        "map",
    ];
}
