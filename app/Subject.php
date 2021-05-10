<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function course()
    {
        return $this->belongsToMany(Course::class, 'course_subject', 'subject_id', 'id_course');
    }
}
