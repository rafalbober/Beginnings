<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_list extends Model
{
    private $studentIndex;
    private $subjectId;
    private $joined;

    public function student()
    {
        return $this->hasMany(Student::class, 'id','id');
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
}
