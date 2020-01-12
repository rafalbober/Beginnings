<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject_cla extends Model
{
    public function subject()
    {
        return $this->belongsTo( Teacher::class);

    }
    public function presence()
    {
        return $this->hasMany(Presence::class);
    }

    public function degree()
    {
        return $this->hasMany(Degree::class);
    }
}
