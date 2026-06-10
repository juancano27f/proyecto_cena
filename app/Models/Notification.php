<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'notifications';

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'trip_id',
        'title',
        'message',
        'is_read',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'is_read'    => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    /**
     * A notification belongs to a trip.
     */
    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Scope unread notifications.
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Scope read notifications.
     */
    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * Get short preview of message.
     */
    public function getMessagePreviewAttribute(): string
    {
        return strlen($this->message) > 80
            ? substr($this->message, 0, 80) . '...'
            : $this->message;
    }
}