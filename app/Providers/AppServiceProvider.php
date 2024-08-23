<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // authorization gates
        Gate::define("admin", function($user){
            return $user->role == "admin";
        });
        Gate::define("user", function($user){
            return $user->role == "user";
        });
        Gate::define("operator", function($user){
            return $user->role == "operator";
        });
        Gate::define("generator", function($user){
            return $user->role == "generator";
        });
        Gate::define("uat", function($user){
            return $user->role == "uat";
        });
    }
}
