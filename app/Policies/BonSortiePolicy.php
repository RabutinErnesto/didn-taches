<?php

namespace App\Policies;

use App\User;
use App\BonSortie;
use Illuminate\Auth\Access\HandlesAuthorization;

class BonSortiePolicy
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
    public function delete(User $user, Bonsortie $bonsortie){
        return $user->id === $bonsortie->user_created;
    }

    public function edit(User $user, Bonsortie $bonsortie){
        return $user->id === $bonsortie->user_created;
    }
    public function show(User $user, Bonsortie $bonsortie){
        return $user->id === $bonsortie->user_created;
    }
}
