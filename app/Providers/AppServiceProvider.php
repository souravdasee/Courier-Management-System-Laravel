<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
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
        Gate::define('admin', function (User $user) {
            return $user->role === 'Admin';
        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });

        Gate::define('operator', function (User $user) {
            return ($user->role === 'Admin' || $user->role === 'Data Entry');
        });

        Blade::if('operator', function () {
            return request()->user()?->can('operator');
        });
    }
}
