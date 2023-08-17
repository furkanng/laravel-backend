<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory, ImageTrait;

    protected $table = "accounts";

    protected $fillable = [
        "bank_name",
        "name",
        "status",
        "image",
        "account_number",
        "branch_name",
        "iban"
    ];
}
