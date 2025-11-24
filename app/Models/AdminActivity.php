<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminActivity extends Model
{
    use HasFactory;

    protected $table = 'admin_activities';

    protected $fillable = [
        'user_id',
        'action',
        'entity_type',
        'entity_id',
        'title',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public static function log($action, $entityType, $entityId = null, $title = null, $meta = null)
    {
        try {
            return static::create([
                'user_id' => auth()->id(),
                'action' => $action,
                'entity_type' => $entityType,
                'entity_id' => $entityId,
                'title' => $title,
                'meta' => is_array($meta) ? $meta : (empty($meta) ? null : ['message' => (string)$meta]),
            ]);
        } catch (\Throwable $e) {
            // Silent fail to avoid breaking main flows
            return null;
        }
    }
}
