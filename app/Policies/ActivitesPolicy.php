<?php

namespace App\Policies;

use App\Activites;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivitesPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }



    public function delete(User $user, Activites $activite){
        return $user->id === $activite->user_created;

    }
    public function edit(User $user, Activites $activite){
        return $user->id === $activite->user_created;
    }
    public function show(User $user, Activites $activite){
        return $user->id === $activite->user_created;
    }
}
