<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "features";
    public $timestamps = false;

    protected $fillable = [
        "id",
        "name",
        "status",
    ];


}
