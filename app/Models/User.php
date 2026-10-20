<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role_id', 'institution_id'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function userRole(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    public function isAdmin(): bool
    {
        if ($this->role_id) {
            return $this->userRole?->name === 'admin';
        }

        return ($this->attributes['role'] ?? null) === 'admin';
    }

    public function isRector(): bool
    {
        if ($this->role_id) {
            return $this->userRole?->name === 'rector';
        }

        return ($this->attributes['role'] ?? null) === 'rector';
    }
}