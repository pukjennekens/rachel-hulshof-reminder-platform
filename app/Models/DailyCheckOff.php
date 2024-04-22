<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyCheckOff extends Model
{
    protected $fillable = ['user_id', 'notification_type_id', 'date', 'is_done'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notificationType()
    {
        return $this->belongsTo(NotificationType::class);
    }
}
