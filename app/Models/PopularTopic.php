<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopularTopic extends Model
{
    protected $fillable = [
        'category_slug',
        'title',
        'description',
        'image',
        'author',
        'rating',
        'is_featured',
        'display_order',
        'article_url',
        'is_published',
    ];

    public function scopeForCategory($query, string $slug)
    {
        return $query->where('category_slug', $slug);
    }
}
