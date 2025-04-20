<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Prestamo;

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
        Gate::define('devolver-prestamo', function ($user, Prestamo $prestamo) {
            return $user->id === $prestamo->user_id || $user->id === $prestamo->user_recibe_id;
        });
    }
}
