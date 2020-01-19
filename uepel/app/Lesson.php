<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function subject()
    {
        return $this->belongsTo( Subject::class);

    }
    public function presence()
    {
        return $this->hasMany(Presence::class,'lesson_number','id');
    }

    public function degree()
    {
        return $this->hasMany(Degree::class,'lesson_number','id');
    }
}
