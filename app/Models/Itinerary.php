<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Itinerary extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'itineraries';

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'trip_id',
        'date',
        'location',
        'activities',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'date'       => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    /**
     * An itinerary belongs to a trip.
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
     * Scope itineraries by date.
     */
    public function scopeByDate($query, $date)
    {
        return $query->whereDate('date', $date);
    }

    /**
     * Scope upcoming itinerary entries.
     */
    public function scopeUpcoming($query)
    {
        return $query->whereDate('date', '>=', now());
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * Get formatted itinerary date.
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->date->format('F d, Y');
    }
}