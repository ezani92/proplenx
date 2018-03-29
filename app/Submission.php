<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public function documents()
    {
        return $this->hasMany('App\Document');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
