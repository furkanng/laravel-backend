<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProduct extends Model
{
    use HasFactory;

    protected $table = "sub_products";

    protected $fillable = [
        "product_id",
        "variant_1",
        "variant_2",
        "code",
        "price",
        "stock",
        "unit",
        "status",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}
