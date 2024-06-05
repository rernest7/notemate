<?php

namespace App\Providers;

use App\Services\MarkDownService;
use App\Services\MarkdownServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->singleton(MarkdownServiceInterface::class, MarkDownService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
