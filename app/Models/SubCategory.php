<?php

namespace App\Models;

use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory, SeoTrait;

    protected $table = "sub_categories";

    protected $fillable = [
        "name",
        "category_id",
        "seo_link",
        "seo_title",
        "seo_description",
        "seo_keywords",
        "status"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }

    public function subsubcategory()
    {
        return $this->hasMany(SubSubCategory::class, "sub_category_id", "id");
    }

}
