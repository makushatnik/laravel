<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'author',
        'published_at',
    ];

    protected $casts = [
        'author'       => 'integer',
        'published_at' => 'datetime',
    ];

    public function isPublished(): bool {
        return isset($this->published_at);
    }
}
