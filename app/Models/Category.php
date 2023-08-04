<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "categories";

    protected $fillable = [
        "name",
        "image",
        "seo_link",
        "seo_title",
        "seo_description",
        "seo_keywords",
        "top_menu",
        "showcase",
        "row",
        "status"
    ];

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public static function booted()
    {
        static::creating(function ($model) {
            $model->ip = request()->ip();
        });

        static::updating(function ($model) {
            $model->ip = request()->ip();
        });
    }
}
