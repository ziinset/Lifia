<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'is_active',
        'sort_order',
        'header_type'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope untuk kategori yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk kategori yang diurutkan
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    /**
     * Relasi dengan artikel (jika model Article ada)
     */
    public function articles()
    {
        if (class_exists('\App\Models\Article')) {
            return $this->hasMany(\App\Models\Article::class, 'category', 'slug');
        }
        
        // Return empty collection jika model Article tidak ada
        return collect();
    }

    /**
     * Generate URL untuk kategori
     */
    public function getUrlAttribute()
    {
        return route('artikel.category', $this->slug);
    }

    /**
     * Get header component berdasarkan header_type
     */
    public function getHeaderComponentAttribute()
    {
        switch ($this->header_type) {
            case 'hero-mental':
                return 'components.hero-mental';
            case 'hero-olga':
                return 'components.hero-olga';
            case 'header1':
                return 'components.header1';
            default:
                return 'components.header';
        }
    }
}
