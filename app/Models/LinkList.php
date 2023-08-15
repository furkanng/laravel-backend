<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkList extends Model
{
    use HasFactory;

    protected $table = "link_list";

    protected $fillable = [
        "link",
        "seo_title",
        "seo_description",
        "seo_keywords",
        "type",
    ];
}
