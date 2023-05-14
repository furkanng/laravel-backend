<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccess extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $table = "personal_access_tokens";

    protected $fillable = [
        "id",
        "tokenable_type",
        "tokenable_id",
        "name",
        "token",
        "abilities",
        "last_used_at",
        "expires_at",
        "created_at",
        "updated_at"
    ];

}
