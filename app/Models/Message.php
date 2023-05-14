<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "messages";

    protected $fillable = [
        "id",
        "subject",
        "name",
        "mail",
        "phone",
        "message",
        "created_at",
        "updated_at",
    ];
}
