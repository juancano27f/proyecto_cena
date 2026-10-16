<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'airline',
        'origin',
        'destination',
        'departure_date',
        'departure_time',
        'seats',
        'price',
        'status',
        'itinerary',
        'guide_name',
    ];

    protected $casts = [
        'departure_date' => 'date',
        'price' => 'decimal:2',
    ];
}