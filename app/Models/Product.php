<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'slug',
        'short_description',
        'long_description',
        'thumbnail',
        'status',
        'user_id',
    ];
}
