<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = "product_image";

    protected $fillable = [
        "product_id",
        "images"
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }

}
