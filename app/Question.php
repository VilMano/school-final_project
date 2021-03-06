<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function question_options()
    {
        return $this->hasMany(optionQuestion::class);
    }
}
