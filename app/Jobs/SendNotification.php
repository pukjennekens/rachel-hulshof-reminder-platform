<?php

namespace App\Jobs;

use App\Models\UserNotificationPreference;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Kreait\Laravel\Firebase\Facades\Firebase;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public UserNotificationPreference $notificationPreference
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Sending notification to ' . $this->notificationPreference->user->email);
        
        Firebase::messaging()->send([
            'message' => [
                'token'        => $this->notificationPreference->user->fcm_token,
                'notification' => [
                    'title' => $this->notificationPreference->notificationType->name,
                    'body'  => 'Klik om te openen 😀',
                ],
            ],
        ]);
    }
}
