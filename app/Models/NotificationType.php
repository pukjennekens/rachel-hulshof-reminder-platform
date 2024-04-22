<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationType extends Model
{
    protected $fillable = ['name', 'default_time'];

    /**
     * Get the user notification preferences for the notification type.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userNotificationPreferences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserNotificationPreference::class);
    }
}
