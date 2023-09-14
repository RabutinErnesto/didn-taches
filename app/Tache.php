<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\User;

class Tache extends Model
{
    use Notifiable;
    protected $fillable = ['nom', 'description', 'done'];

    /**
     * Get the user that owns the Tache
     *
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    /**
     * get user affected to tache
     *
     */
    public function tacheAffectedTo()
    {
        return $this->belongsTo('App\User', 'affectedTo_id');
    }
    /**
     * get user affected  tache by
     *
     */
    public function tacheAffectedBy()
    {
        return $this->belongsTo('App\User', 'affectedBy_id');
    }
    public function maintenance()
    {
        return  $this->belongsTo('App\Maintenace', 'maintenance_id');
    }

    public function direction()
    {
        return $this->belongsTo('App\Direction', 'direction_id');
    }
    public function service()
    {
        return $this->belongsTo('App\Service', 'service_id');
    }
}
