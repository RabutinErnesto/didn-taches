<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiches extends Model
{
    use HasFactory;

    protected $casts = [
        'data' => 'array'
   ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_created');
    }
    public function direction()
    {
        return $this->belongsTo('App\Direction');
    }
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
    public function materiel()
    {
        return $this->belongsTo('App\Materiel');
    }
    public function probleme()
    {
        return $this->belongsTo('App\Probleme');
    }
    public function solution()
    {
        return $this->belongsTo('App\Solution');
    }
    public function resultat()
    {
        return $this->belongsTo('App\Resultat');
    }
}
