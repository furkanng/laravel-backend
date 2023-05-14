<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "accounts";

    protected $fillable = [
        "id",
        "bank_name",
        "name",
        "status",
        "image",
        "account_number",
        "branch_name",
        "iban"
    ];
}
