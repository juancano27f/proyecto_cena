<?php

class Institution extends Model
{
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}