<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\UserNotificationPreference;
use Illuminate\Support\Facades\Log;

class SendNotification implements ShouldQueue
{
    /**
     * Create a new job instance.
     */
    public function __construct(
        /**
         * @var UserNotificationPreference
         */
        private UserNotificationPreference $notificationPreference
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::debug('Sending notification to user: ' . $this->notificationPreference->user_id);
    }
}
