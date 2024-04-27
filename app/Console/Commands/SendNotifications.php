<?php

namespace App\Console\Commands;

use App\Jobs\SendNotification;
use App\Models\UserNotificationPreference;
use Illuminate\Console\Command;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notifications';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $notificationPreferences = UserNotificationPreference::where('notification_time', now()->format('H:i'))->get();

        foreach($notificationPreferences as $notificationPreference) {
            dispatch(new SendNotification($notificationPreference));
        }
    }
}
