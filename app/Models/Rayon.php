<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $fillable = [
        'code', 'name'
    ];

    public function candidate() {
        return $this->hasMany('App\Models\Candidate');
    }

    public function users() {
        return $this->hasMany('App\Models\User');
    }
}
