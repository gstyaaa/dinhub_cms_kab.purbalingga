<?php

namespace App\Providers;

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\View;
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
        View::composer([
            'layouts.*',
            'partials.*',
            'home',
            'posts.*',
            'gallery.*',
        ], function ($view) {
            $view->with('settings', WebsiteSetting::first());
        });
    }
}
