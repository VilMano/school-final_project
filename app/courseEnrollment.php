<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courseEnrollment extends Model
{
    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
