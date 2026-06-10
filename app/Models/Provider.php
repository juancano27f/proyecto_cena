<?php

class Provider extends Model
{
    public function tripServices()
    {
        return $this->hasMany(TripService::class);
    }
}