<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function ccodes()
    {
        return $this->belongsToMany(Course::class, 'ccode', 'user_id', 'course_id');
    }

    public function courseEnrollment()
    {
        return $this->belongsToMany(Course::class, 'course_enrollment', 'user_id', 'course_id');
    }

    public function courseFavourite()
    {
        return $this->belongsToMany(Course::class, 'favourite', 'user_id', 'course_id');
    }

    public function userSpecialization()
    {
        return $this->belongsToMany(Specialization::class, 'specialization_course', 'user_id', 'specialization_id');
    }

    public function userScode()
    {
        return $this->belongsToMany(Specialization::class, 'scode', 'specialization_id', 'user_id');
    }
}
