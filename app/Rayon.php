<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $fillable = [
        'code', 'name'
    ];

    public function candidate() {
        return $this->hasMany('App\Candidate');
    }

    public function users() {
        return $this->hasMany('App\User');
    }
}
