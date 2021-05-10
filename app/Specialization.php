<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    public function courseSpecialization()
    {
        return $this->belongsToMany(Course::class, 'course_specialization', 'specialization_id', 'course_id');
    }

    public function specializationUser()
    {
        return $this->belongsToMany(User::class, 'enrollment_specialization', 'specialization_id', 'user_id');
    }

    public function specializationCode()
    {
        return $this->belongsToMany(User::class, 'scode', 'specialization_id', 'user_id');
    }
}
