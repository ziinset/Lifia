<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'color',
        'is_pinned'
    ];

    protected $casts = [
        'is_pinned' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the user that owns the note
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope to get pinned notes
     */
    public function scopePinned($query)
    {
        return $query->where('is_pinned', true);
    }

    /**
     * Scope to get notes by user
     */
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope to order by pinned first, then by updated_at
     */
    public function scopeOrderByPriority($query)
    {
        return $query->orderBy('is_pinned', 'desc')
                    ->orderBy('updated_at', 'desc');
    }

    /**
     * Get formatted created date
     */
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d M Y, H:i');
    }

    /**
     * Get formatted updated date
     */
    public function getFormattedUpdatedAtAttribute()
    {
        return $this->updated_at->format('d M Y, H:i');
    }

    /**
     * Get time ago format
     */
    public function getTimeAgoAttribute()
    {
        return $this->updated_at->diffForHumans();
    }

    /**
     * Get preview of content (first 100 characters)
     */
    public function getContentPreviewAttribute()
    {
        return strlen($this->content) > 100 
            ? substr($this->content, 0, 100) . '...' 
            : $this->content;
    }
}
