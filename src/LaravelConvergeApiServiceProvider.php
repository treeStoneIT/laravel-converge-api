<?php

namespace Treestoneit\LaravelConvergeApi;

use Illuminate\Support\ServiceProvider;

class LaravelConvergeApiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     */
    protected bool $defer = false;

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/converge-api.php' => config_path('converge-api.php'),
            ], 'config');
        }
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/converge-api.php',
            'converge-api'
        );

        $this->app->bind('converge', fn () => new Converge);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return ['converge'];
    }
}
