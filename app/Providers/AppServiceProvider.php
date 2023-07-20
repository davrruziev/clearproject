<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use zIlluminate\View\View;

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
        Paginator::useBootstrap();

         view()->composer('components.layouts.navbar', function ($view) {
             $view->with('current_locale',App::currentLocale());
             $view->with('all_locales',config('app.all_locales'));
         });

    }
}
