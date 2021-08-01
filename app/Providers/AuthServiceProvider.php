<?php

namespace App\Providers;
use Laravel\Passport\Passport;
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
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        // Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');

        Gate::define('manage-users', function($user){
         return count(array_intersect(["ADMIN"], json_decode($user->roles)));
     });

        Gate::define('manage-categories', function($user){
         return count(array_intersect(["ADMIN", "STAFF"],
            json_decode($user->roles)));
     });

        Gate::define('manage-products', function($user){
         return count(array_intersect(["ADMIN", "STAFF"],
            json_decode($user->roles)));
     });

        Gate::define('manage-orders', function($user){
         return count(array_intersect(["ADMIN", "STAFF"],
            json_decode($user->roles)));
     });

        //
    }
}
