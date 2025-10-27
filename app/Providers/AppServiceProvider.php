<?php

namespace App\Providers;

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
        Paginator::useBootStrapFive();
        Gate::define('acctgAdmin',function($user){
            return in_array($user->userlevel, [2,4]);
        });
         Gate::define('hrdAdmin',function($user){
            return in_array($user->userlevel, [3,4]);
        });
    }
}
