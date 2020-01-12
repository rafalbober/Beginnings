<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_list extends Model
{
    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
}
