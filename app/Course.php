<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function ccodes()
    {
        return $this->belongsToMany(User::class, 'ccode', 'course_id', 'user_id');
    }

    public function userEnrollment()
    {
        return $this->belongsToMany(User::class, 'course_enrollment', 'course_id', 'user_id');
    }

    public function duration()
    {
        return $this->belongsTo(Duration::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function subject()
    {
        return $this->belongsToMany(Subject::class, 'subject_course', 'course_id', 'subject_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function userFavorite()
    {
        return $this->belongsToMany(User::class, 'favourites', 'course_id', 'user_id');
    }

    public function courseSpecialization()
    {
        return $this->belongsToMany(User::class, 'course_specialization', 'course_id', 'course_id', 'specialization_id');
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
