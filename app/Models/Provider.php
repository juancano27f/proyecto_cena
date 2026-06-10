<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provider extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'providers';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'service_type',
        'email',
        'phone',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    /**
     * A provider has many trip services.
     */
    public function tripServices(): HasMany
    {
        return $this->hasMany(TripService::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Scope to filter providers by service type.
     */
    public function scopeByServiceType($query, string $type)
    {
        return $query->where('service_type', $type);
    }

    /**
     * Scope to search providers by name.
     */
    public function scopeSearch($query, string $value)
    {
        return $query->where('name', 'like', "%{$value}%");
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * Get formatted provider name.
     */
    public function getFormattedNameAttribute(): string
    {
        return ucwords($this->name);
    }
}