<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'author',
        'keywords',
        'category',
        'image',
        'file_path',
        'is_published',
        'published_at',
        'article_type',
        'article_layout',
        'is_main_article',
        'display_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];
}