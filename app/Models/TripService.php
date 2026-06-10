<?php

class TripService extends Model
{
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}