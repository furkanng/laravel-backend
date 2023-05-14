<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "features";

    protected $fillable = [
        "id",
        "name",
        "status",
        "variant_id"
    ];

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

}
