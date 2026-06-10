<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TripService extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'trip_services';

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'trip_id',
        'provider_id',
        'service_name',
        'cost',
        'details',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'cost'       => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    /**
     * A trip service belongs to a trip.
     */
    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }

    /**
     * A trip service belongs to a provider.
     */
    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Scope services by provider.
     */
    public function scopeByProvider($query, int $providerId)
    {
        return $query->where('provider_id', $providerId);
    }

    /**
     * Scope services with cost greater than zero.
     */
    public function scopePaid($query)
    {
        return $query->whereNotNull('cost');
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * Get formatted cost with currency.
     */
    public function getFormattedCostAttribute(): string
    {
        return $this->cost
            ? '$' . number_format($this->cost, 2)
            : 'Free';
    }
}