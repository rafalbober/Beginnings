<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deanery extends Model
{
    public function subject_cla()
    {
        return $this->belongsTo( Subject_cla::class );
    }
}
