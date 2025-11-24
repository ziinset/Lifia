<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FitplanArticle extends Model
{
    use HasFactory;

    protected $table = 'fitplan_articles';

    protected $fillable = [
        'category',
        'title',
        'author',
        'description',
        'image',
        'link',
        'is_featured',
        'order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    /**
     * Scope untuk artikel berdasarkan kategori
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope untuk artikel utama
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope untuk artikel terbaru dengan batas tertentu
     */
    public function scopeLatestLimited($query, $limit = 4)
    {
        return $query->orderBy('order', 'asc')
                    ->orderBy('created_at', 'desc')
                    ->limit($limit);
    }
}
