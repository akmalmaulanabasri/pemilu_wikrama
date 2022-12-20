<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'image', 
        'nis', 
        'name', 'gender', 
        'rayon_id', 
        'visi', 
        'misi',
        'latar_belakang'
    ];

    public function rayon() {
        return $this->belongsTo('App\Models\Rayon', 'rayon_id');
    }

    public function votes() {
        return $this->belongsTo('App\Models\Vote', 'candidate_id');
    }
}
