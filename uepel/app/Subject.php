<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject_cla()
    {
        return $this->hasMany(Subject_cla::class);
    }

    public function presence()
    {
        return $this->hasMany(Presence::class);
    }

    public function degree()
    {
        return $this->hasMany(Degree::class);
    }

    private $name;
    private $signup_capacity;
    private $description;
    private $teacher_id;
}
