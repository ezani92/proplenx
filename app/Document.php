<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['submission_id', 'original_name', 'filename'];
 
    public function submission()
    {
        return $this->belongsTo('App\Submission');
    }
}
