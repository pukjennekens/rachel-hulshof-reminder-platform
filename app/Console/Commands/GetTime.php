<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-time';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $time = now()->setSeconds(0)->format('H:i:s');
        $this->info('The current time is ' . $time);
    }
}
