<?php

namespace App\Providers;

use App\Actions\Notes\ReadNote;
use App\Actions\ActionInterface;
use App\Services\MarkdownService;
use Illuminate\Support\ServiceProvider;
use App\Services\MarkdownServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(MarkdownServiceInterface::class, MarkdownService::class);
        $this->app->bind(ActionInterface::class, ReadNote::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
