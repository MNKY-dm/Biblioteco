<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
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
        Gate::define('access-staff-dashboard', function (User $user) {
            return in_array($user->role->role, ['STAFF', 'ADMIN']);
        });

        Gate::define('access-admin-dashboard', function (User $user) {
            return $user->role->role === 'ADMIN';
        });
        Paginator::useBootstrapFive();
    }
}
