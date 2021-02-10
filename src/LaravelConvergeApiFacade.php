<?php

namespace Treestoneit\LaravelConvergeApi;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Treestoneit\LaravelConvergeApi\LaravelConvergeApi
 */
class LaravelConvergeApiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'converge';
    }
}
