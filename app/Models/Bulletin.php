<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "bulletin";

    protected $fillable = ["email"];

    public static function booted()
    {
        static::creating(function ($model) {
            $model->ip = request()->ip();
        });

        static::updating(function ($model) {
            $model->ip = request()->ip();
        });
    }
}
