<?php

class Itinerary extends Model
{
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}