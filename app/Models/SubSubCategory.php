<?php

namespace App\Models;

use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory, SeoTrait;

    protected $table = "sub_sub_categories";

    protected $fillable = [
        "name",
        "sub_category_id",
        "brand_id",
        "seo_link",
        "seo_title",
        "seo_description",
        "seo_keywords",
        "status"
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, "brand_id", "id");
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, "sub_category_id", "id");
    }
}
