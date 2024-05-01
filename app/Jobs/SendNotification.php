<?php

namespace App\Jobs;

use App\Models\UserNotificationPreference;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Messaging\CloudMessage;
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

        $message = CloudMessage::fromArray([
            'token'        => $this->notificationPreference->user->fcm_token,
            'notification' => [
                'title' => $this->notificationPreference->notificationType->heading ?? $this->notificationPreference->notificationType->name ?? 'Eetmoment',
                'body'  => $this->notificationPreference->notificationType->subheading ?? 'Het is tijd om te eten!',
            ],
        ]);

        Log::info('Message: ' . json_encode($message));

        Firebase::messaging()->send($message);
    }
}
