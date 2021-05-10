<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    public function course()
    {
        return $this->hasMany(Course::class, 'duration_id');
    }

    public function duration_type()
    {
        return $this->belongsTo(durationType::class, 'id_duration_type');
    }
}
