<?php

class Notification extends Model
{
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}