<?php

class Trip extends Model
{
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class);
    }

    public function tripServices()
    {
        return $this->hasMany(TripService::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}