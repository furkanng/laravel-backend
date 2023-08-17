<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = "addresses";

    protected $fillable = [
        "email",
        "name",
        "surname",
        "phone",
        "address",
        "city",
        "district",
        "title",
        "invoice_type",
        "tax_number",
        "tax_area",
        "company_name",
        "status",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function booted()
    {
        static::creating(function ($model) {
            $model->user_id = auth("api")->user()->id;
        });

        static::updating(function ($model) {
            $model->user_id = auth("api")->user()->id;
        });
    }
}
