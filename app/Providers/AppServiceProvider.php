<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MarkdownServiceInterface;
use App\Services\MarkdownService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(MarkdownServiceInterface::class, MarkdownService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
