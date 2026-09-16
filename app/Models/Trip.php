<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'trips';

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'institution_id',
        'user_id',
        'flight_id',
        'teacher_name',
        'title',
        'description',
        'start_date',
        'end_date',
        'budget',
        'status',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
        'budget'     => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    /**
     * Trip belongs to an institution.
     */
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
    /**
     * Trip belongs to a user (creator/manager).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Trip has many itineraries.
     */
    public function itineraries(): HasMany
    {
        return $this->hasMany(Itinerary::class);
    }

    /**
     * Trip has many services.
     */
    public function tripServices(): HasMany
    {
        return $this->hasMany(TripService::class);
    }

    /**
     * Trip has many documents.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    /**
     * Trip has many notifications.
     */
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Trip belongs to many students.
     */
   public function students()
{
    return $this->belongsToMany(Student::class);
}

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Scope by status.
     */
    public function scopeByStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope for upcoming trips.
     */
    public function scopeUpcoming($query)
    {
        return $query->whereDate('start_date', '>=', now());
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * Get trip duration in days.
     */
    public function getDurationAttribute(): int
    {
        return $this->start_date->diffInDays($this->end_date);
    }

    /**
     * Check if trip is active.
     */
    public function getIsActiveAttribute(): bool
    {
        return now()->between($this->start_date, $this->end_date);
    }
}