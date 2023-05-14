<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "addresses";

    protected $fillable = [
        "id",
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
        "user_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
