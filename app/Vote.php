<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'user_id', 'candidate_id'
    ];

    public function users() {
        return $this->hasMany('App\User');
    }

    public function candidates() {
        return $this->hasMany('App\Candidate');
    }
}
