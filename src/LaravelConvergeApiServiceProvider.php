<?php

namespace Treestoneit\LaravelConvergeApi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Treestoneit\LaravelConvergeApi\Commands\LaravelConvergeApiCommand;

class LaravelConvergeApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-converge-api')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_converge_api_table')
            ->hasCommand(LaravelConvergeApiCommand::class);
    }
}
