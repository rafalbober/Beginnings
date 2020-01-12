<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    public function subject_cla()
    {
        return $this->belongsTo( Subject_cla::class );
    }
}
