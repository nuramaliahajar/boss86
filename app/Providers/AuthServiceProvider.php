<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('akademik', function ($user) {
            return $user->role == 0;
        });
        Gate::define('mahasiswa', function ($user) {
            return $user->role == 1;
        });
        Gate::define('dosen', function ($user) {
            return $user->role == 2;
        });
    }
}
