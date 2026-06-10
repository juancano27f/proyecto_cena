<?php

class Student extends Model
{
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function trips()
    {
        return $this->belongsToMany(Trip::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}