<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends /*Model*/ Authenticatable
{
    use Notifiable;

    protected $guard = 'student';

    protected $fillable = [
        'name', 'surname', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function degree()
    {
        return $this->hasMany(Degree::class,'student_index','id');
    }

    public function presence()
    {
        return $this->hasMany(Presence::class);
    }

}
