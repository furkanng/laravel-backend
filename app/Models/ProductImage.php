<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "product_image";
    public $timestamps = false;


    protected $fillable = [
        "id",
        "product_id",
        "images"
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
