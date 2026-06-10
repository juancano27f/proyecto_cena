<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Institution extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'institutions';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    /**
     * The attributes that should be cast.
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
     * An institution has many students.
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    /**
     * An institution has many trips.
     */
    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Scope to search institutions by name.
     */
    public function scopeSearch($query, $value)
    {
        return $query->where('name', 'like', "%{$value}%");
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * Get formatted institution name.
     */
    public function getFormattedNameAttribute(): string
    {
        return ucwords($this->name);
    }
}