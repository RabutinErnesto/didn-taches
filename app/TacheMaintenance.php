<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TacheMaintenance extends Model
{
    use HasFactory;

    public function maintenace(){

        return  $this->belongsTo('App\Maintenace');
    }
}
