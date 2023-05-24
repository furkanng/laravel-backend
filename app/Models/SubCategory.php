<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "subcategories";
    public $timestamps = false;

    protected $fillable = [
        "id",
        "name",
        "category_id"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
