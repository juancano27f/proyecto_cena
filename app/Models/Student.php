<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     */
   protected $fillable = [
    'institution_id',
    'first_name',
    'last_name',
    'birth_date',
    'guardian_name',
    'guardian_phone',
    'document_type',
    'document_number',
    'student_phone',
    'email',
    'address',
    'city',
    'grade',
    'blood_type',
    'allergies',
    'guardian_document',
    'guardian_email',
    'emergency_contact_name',
    'emergency_contact_phone',
];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'birth_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    /**
     * A student belongs to an institution.
     */
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    /**
     * A student belongs to many trips.
     */
    public function trips()
{
    return $this->belongsToMany(Trip::class);
}

    /**
     * A student can have many documents.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Scope to search student by name.
     */
    public function scopeSearch($query, string $value)
    {
        return $query->where('first_name', 'like', "%{$value}%")
                     ->orWhere('last_name', 'like', "%{$value}%");
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * Get full name of the student.
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get student age.
     */
    public function getAgeAttribute(): ?int
    {
        return $this->birth_date
            ? $this->birth_date->age
            : null;
    }
}