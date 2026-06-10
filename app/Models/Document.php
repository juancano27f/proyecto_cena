<?php

class Document extends Model
{
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}