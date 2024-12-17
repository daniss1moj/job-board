<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('path.public', function() {
            return base_path().'/public_html';
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        $defaultTitle = 'Пошук роботи в Україні | Huntberry';
        $defaultDescription = 'Знайдіть роботу своєї мрії, пошук роботи в Україні - Huntberry';

        View::share('title', $defaultTitle);
        View::share('metaDescription', $defaultDescription);
        Schema::defaultStringLength(191);

    }
}
