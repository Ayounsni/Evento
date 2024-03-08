<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
                        // Directive @admin
                        Blade::if('admin', function () {
                            return auth()->check() && auth()->user()->role === 'admin';
                        });
                
                        // Directive @user
                        Blade::if('user', function () {
                            return auth()->check() && auth()->user()->role === 'user';
                        });
                
                        // Directive @organisateur
                        Blade::if('organisateur', function () {
                            return auth()->check() && auth()->user()->role === 'organisateur';
                        });
    }
}
