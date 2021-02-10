<?php

namespace Treestoneit\LaravelConvergeApi\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Treestoneit\LaravelConvergeApi\LaravelConvergeApiServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelConvergeApiServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        /*
        include_once __DIR__.'/../database/migrations/create_laravel_converge_api_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
