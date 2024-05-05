<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationType extends Model
{
    protected $fillable = ['name', 'default_time', 'heading', 'subheading', 'default_on'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'default_on' => 'boolean',
        ];
    }

    /**
     * Get the user notification preferences for the notification type.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userNotificationPreferences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserNotificationPreference::class);
    }

    /**
     * Get the daily check offs for the notification type.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dailyCheckOffs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DailyCheckOff::class);
    }

    /**
     * Handle deleting the notification type.
     * 
     * @return void
     */
    public function delete(): void
    {
        $this->userNotificationPreferences()->delete();
        $this->dailyCheckOffs()->delete();

        parent::delete();
    }
}
