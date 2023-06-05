<?php

namespace App\Providers;

Use App\Tache;
use App\Fiches;
Use App\Policies\TachePolicy;
Use App\Policies\FichePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Tache::class => TachePolicy::class,
        Fiches::class => FichePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('manage-users', function($user){

            return $user->hasAnyRole(['admin']);

        });

        Gate::define('edit-users', function($user){
            return $user->hasAnyRole(['admin']);
        });

        Gate::define('delete-users', function($user){
            return $user->isAdmin();
        });
    }
}
