<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{


    /**
     * @var int|null
     */
    private $teacher_id;
    private $name;
    private $signup_capacity;
    private $description;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
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





}
