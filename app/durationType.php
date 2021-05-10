<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class durationType extends Model
{
    protected $table = "duration_types";

    public function duration()
    {
        return $this->hasMany(Duration::class, 'id_duration_type');
    }
}
