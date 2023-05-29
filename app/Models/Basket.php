<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Basket extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "basket";
    public $timestamps = true;

    protected $fillable = [
        "id",
        "user_id",
        "product_id",
        "piece",
        "price",
        "variant_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
