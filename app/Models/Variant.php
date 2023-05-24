<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "variants";
    public $timestamps = false;

    protected $fillable = [
        "id",
        "name",
        "feature_id",
        "status"
    ];
}
