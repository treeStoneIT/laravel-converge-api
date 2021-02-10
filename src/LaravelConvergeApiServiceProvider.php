<?php

namespace Treestoneit\LaravelConvergeApi;

use Illuminate\Support\ServiceProvider;

class LaravelConvergeApiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/converge-api.php' => config_path('converge-api.php'),
            ], 'config');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/converge-api.php', 'converge-api'
        );

        $this->app->bind('converge', function($app) {
            return new Converge();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['converge'];
    }

}
