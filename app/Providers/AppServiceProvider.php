<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Gate::define("user", fn($user) => $user->role === "user");
        Gate::define("admin", fn($user) => $user->role === "admin");
        Gate::define("uat", fn($user) => $user->role === "uat");
        Gate::define("operator", fn($user) => $user->role === "operator");
        Gate::define("generator", fn($user) => $user->role === "generator");
    }
}
