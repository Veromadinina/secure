<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
            /*Creation d'un accès administrateur
            1.'nom a creer'
            2. Enlever post garder user en important la classe
            3. return $user ->colonne DB admin*/
            
        Gate::define('access-admin', function (User $user) {
            
                return $user->admin;
        });

    
    }
}
