<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use Notifiable;

    protected $guard = 'teacher';

    protected $fillable = [
        'name', 'surname', 'email', 'teacher_id', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
}

