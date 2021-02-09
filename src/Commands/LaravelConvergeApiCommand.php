<?php

namespace Treestoneit\LaravelConvergeApi\Commands;

use Illuminate\Console\Command;

class LaravelConvergeApiCommand extends Command
{
    public $signature = 'laravel-converge-api';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
