<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }

}
