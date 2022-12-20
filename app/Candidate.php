<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'image', 'nis', 'name', 'sex', 'rayon_id', 'visi', 'misi','latar_belakang'
    ];

    public function rayon() {
        return $this->belongsTo('App\Rayon', 'rayon_id');
    }

    public function votes() {
        return $this->belongsTo('App\Vote', 'candidate_id');
    }
}
