<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantCategory extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "variant_categories";

    protected $fillable = [
        "name",
        "status",
    ];

    public function variants()
    {
        return $this->hasMany(Variant::class, "category_id", "id");
    }


}
