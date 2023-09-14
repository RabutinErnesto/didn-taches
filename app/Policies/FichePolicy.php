<?php

namespace App\Policies;

use App\User;
use App\Fiches;
use Illuminate\Auth\Access\HandlesAuthorization;

class FichePolicy
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
    public function delete(User $user, Fiches $fiche){
        return $user->id === $fiche->user_created;
    }

    public function edit(User $user, Fiches $fiche){
        return $user->id === $fiche->user_created;
    }
    public function show(User $user, Fiches $fiche){
        return $user->id === $fiche->user_created;
    }
}
