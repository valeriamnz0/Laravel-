<?php

namespace App\Providers;

use App\Rol;
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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $roles = Rol::all();
        /* define a admin user role */
        Gate::define('isAdmin', function ($user) use ($roles) {
            return $user->fk_rolID == $roles->where('descripcion', 'Admin')->first()->rolID;
        });

        /* define a Technician user role */
        Gate::define('isTech', function ($user) use ($roles) {
            return $user->fk_rolID == $roles->where('descripcion', 'Instalador')->first()->rolID;
        });

        /* define a seller role */
        Gate::define('isSeller', function ($user) use ($roles) {
            return $user->fk_rolID == $roles->where('descripcion', 'Vendedor')->first()->rolID;
        });
    }
}
