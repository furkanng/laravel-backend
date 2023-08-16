<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $table = "variants";

    protected $fillable = [
        "name",
        "category_id",
        "status"
    ];

    public function category()
    {
        return $this->belongsTo(VariantCategory::class, 'category_id', "id");
    }
}
