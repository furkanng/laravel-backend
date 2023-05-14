<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $table = "settings";

    protected $fillable = [
        "id",
        "title",
        "key",
        "value",
        "type",
        "group_key",
    ];
}
