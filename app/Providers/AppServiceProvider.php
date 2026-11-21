<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);

        // Dynamically provide top published AI SEO Location Pages to the footer
        view()->composer('*', function ($view) {
            try {
                if (Schema::hasTable('seo_location_pages')) {
                    $footerLocationPages = \App\Models\SeoLocationPage::where('status', 'published')
                        ->orderBy('views', 'desc')
                        ->orderBy('id', 'desc')
                        ->take(8)
                        ->get();
                    $view->with('footerLocationPages', $footerLocationPages);
                } else {
                    $view->with('footerLocationPages', collect());
                }
            } catch (\Throwable $e) {
                $view->with('footerLocationPages', collect());
            }
        });
    }
}
