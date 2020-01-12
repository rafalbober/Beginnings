<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function degree()
    {
        return $this->hasMany(Degree::class);
    }

    public function presence()
    {
        return $this->hasMany(Presence::class);
    }
}
