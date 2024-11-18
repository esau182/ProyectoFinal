<?php

namespace App\Providers;

use App\Models\Delito;
use App\Models\User;
use App\Policies\UserPolicy;
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
        Gate::define('viewContacto', function (User $user) {
            if($user->exists())
                return true;
        });

        Gate::define('createDelito', function (User $user) {
            if($user->exists())
                return true;
        });

        Gate::define('viewAnything', function (User $user) {
            if($user->exists())
                return true;
        });

        Gate::define('editDelito', function (User $user, Delito $delito) {
            if($user->exists() && $delito->user_id == $user->id)
                return true;
        });

        Gate::define('destroyDelito', function (User $user, Delito $delito) {
            if($user->exists() && $delito->user_id == $user->id)
                return true;
        });
    }
}
