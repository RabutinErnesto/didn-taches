<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonSortie extends Model
{
    use HasFactory;


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
}
