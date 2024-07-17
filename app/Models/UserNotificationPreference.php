<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class UserNotificationPreference extends Model
{
    protected $fillable = ['user_id', 'notification_type_id', 'notification_time', 'receive_notification'];

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
}
