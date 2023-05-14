<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "admin";

    protected $fillable = [
        "id",
        "name",
        "surname",
        "mail",
        "password",
        "status",
        "created_at",
        "updated_at"
    ];
}
