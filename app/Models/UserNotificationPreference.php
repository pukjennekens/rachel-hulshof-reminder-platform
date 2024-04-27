<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class UserNotificationPreference extends Model
{
    protected $fillable = ['user_id', 'notification_type_id', 'notification_time'];

    /**
     * Get the user for the user notification preference.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the notification type for the user notification preference.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notificationType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(NotificationType::class);
    }

    /**
     * On create or update, set the schedule for the job to send the notification
     * 
     * @return void
     */
    protected static function booted(): void
    {
        static::created(function (UserNotificationPreference $userNotificationPreference) {
            Log::debug('User notification preference saved: ' . $userNotificationPreference->id);
            self::scheduleNotification($userNotificationPreference);
        });

        static::updated(function (UserNotificationPreference $userNotificationPreference) {
            Log::debug('User notification preference updated: ' . $userNotificationPreference->id);
            self::scheduleNotification($userNotificationPreference);
        });
    }

    /**
     * Schedule the notification job
     * 
     * @param UserNotificationPreference $userNotificationPreference
     * @return void
     */
    private static function scheduleNotification(UserNotificationPreference $userNotificationPreference): void
    {
        Log::debug('Scheduling notification for user: ' . $userNotificationPreference->user_id);
        $jobName          = 'SendNotification-' . $userNotificationPreference->id;
        $notificationTime = $userNotificationPreference->notification_time;
    }
}
