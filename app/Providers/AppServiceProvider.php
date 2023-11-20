<?php

namespace App\Providers;

use App\Contracts\QuoteContract;
use App\Managers\QuoteManager;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
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
        //register the client interface
        $this->app->bind(
            ClientInterface::class,
            Client::class
        );

        $this->app->bind(
            QuoteContract::class,
            QuoteManager::class
        );
    }
}
