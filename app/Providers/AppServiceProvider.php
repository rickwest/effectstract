<?php

namespace App\Providers;

use App\Services\TextExtraction\AwsTextExtraction;
use App\Services\TextExtraction\TextExtraction;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TextExtraction::class, AwsTextExtraction::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
