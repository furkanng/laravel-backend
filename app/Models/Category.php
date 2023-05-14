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
        "id",
        "name",
        "status",
        "image"
    ];

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
}
