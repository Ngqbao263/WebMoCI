<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'thumbnail',
        'status',
    ];

    /**
     * Một bài viết thuộc về một người dùng (tác giả)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
