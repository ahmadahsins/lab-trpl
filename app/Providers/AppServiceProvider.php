<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;

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
        // Register the app-layout component
        Blade::component('app-layout', \App\View\Components\AppLayout::class);
        
        // Use Tailwind pagination views
        Paginator::defaultView('components.pagination-links');
        Paginator::defaultSimpleView('components.pagination-links');
    }
}
