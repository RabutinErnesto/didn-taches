<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenace extends Model
{
    use HasFactory;

    public function TacheMaintenance(){
        return $this->belongsTo('App\TacheMaintenance');
    }
}
