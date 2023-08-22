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
        "seo_link",
        "seo_title",
        "seo_description",
        "seo_keywords",
        "code",
        "price",
        "stock",
        "unit",
        "status",
    ];
}
