<?php

namespace App\Console\Commands;

use App\Models\NotificationType;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AddNotificationType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Nieuw notificatie type toevoegen';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name        = $this->ask('Wat is de naam van het notificatie type?');
        $defaultTime = $this->ask('Wat is de standaard tijd voor de notificatie?');

        if(!preg_match('/^([01][0-9]|2[0-3]):[0-5][0-9]$/', $defaultTime)) {
            $this->error('De tijd moet in het formaat 00:00 zijn.');
            return;
        }

        if(NotificationType::where('name', $name)->exists()) {
            $this->error('Dit notificatie type bestaat al.');
            return;
        }

        NotificationType::create([
            'name'         => $name,
            'default_time' => $defaultTime,
        ]);
    }
}
