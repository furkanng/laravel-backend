<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $primaryKey = "id";

    protected $fillable = [
        "id",
        "title",
        "price",
        "status",
        "stock",
        "code",
        "date",
        "description",
        "cover_image",
        "new_product",
        "spot_text",
        "category_id",
        "subcategory_id",
    ];

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function basket()
    {
        return $this->hasMany(Basket::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
