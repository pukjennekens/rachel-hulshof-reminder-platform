<?php

namespace App\Console\Commands;

use App\Jobs\SendNotification;
use App\Models\UserNotificationPreference;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

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
        // Round the current time in set the seconds to 0
        $time = now()->setSeconds(0)->format('H:i:s');
        Log::debug('Sending notifications for time ' . $time);
        $notificationPreferences = UserNotificationPreference::where('notification_time', $time)->where('receive_notification', true)->get();
        Log::debug('Found ' . $notificationPreferences->count() . ' notification preferences');

        foreach($notificationPreferences as $notificationPreference) {
            dispatch(new SendNotification($notificationPreference));
        }
    }
}
