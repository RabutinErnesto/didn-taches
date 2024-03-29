<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activites extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_created');
    }
    public function services(){
        return  $this->HasMany('App\ServiceDIDN');
    }
}
