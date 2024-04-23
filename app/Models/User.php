<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    /**
     * Get the weight measurements for the user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function weightMeasurements(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(WeightMeasurement::class);
    }

    /**
     * Get the user's total change in weight, the difference between the first and last weight measurement.
     * 
     * @return float|null
     */
    public function getWeightChangeAttribute(): ?float
    {
        $firstWeightMeasurement = $this->weightMeasurements->sortBy('date')->first();
        $lastWeightMeasurement  = $this->weightMeasurements->sortByDesc('date')->first();

        if ($firstWeightMeasurement && $lastWeightMeasurement)
            return $lastWeightMeasurement->weight - $firstWeightMeasurement->weight;

        return null;
    }

    /**
     * Get the water intake logs associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function waterIntakeLogs()
    {
        return $this->hasMany(WaterIntakeLog::class);
    }

    /**
     * Get today's water intake for the user
     * 
     * @return int
     */
    public function getTodaysWaterIntakeAttribute(): int
    {
        $today             = Carbon::now()->toDateString();
        $todaysWaterIntake = $this->waterIntakeLogs->where('date', $today)->sum('quantity');

        return $todaysWaterIntake;
    }

    /**
     * Set today's water intake for the user
     * 
     * @param int $quantity
     * @return void
     */
    public function setTodaysWaterIntake(int $quantity): void
    {
        $today      = Carbon::now()->toDateString();
        $todaysLogs = $this->waterIntakeLogs->where('date', $today)->first();

        if(!$todaysLogs) {
            $todaysLogs = new WaterIntakeLog([
                'date'     => $today,
                'quantity' => $quantity,
            ]);
            $this->waterIntakeLogs()->save($todaysLogs);
        } else {
            $todaysLogs->quantity = $quantity;
            $todaysLogs->save();
        }
    }

    /**
     * Increment today's water intake for the user
     * 
     * @param int $quantity The quantity to increment by, default is 1
     * @return void
     */
    public function incrementTodaysWaterIntake(int $quantity = 1): void
    {
        $this->setTodaysWaterIntake($this->todaysWaterIntake + $quantity);
    }

    /**
     * Get the user's notification preferences.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notificationPreferences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserNotificationPreference::class);
    }

    /**
     * Check if a user has the specified notification preference enabled.
     * 
     * @param int $notificationTypeId
     * @return bool
     */
    public function hasNotificationPreferenceEnabled(int $notificationTypeId): bool
    {
        return $this->notificationPreferences()->where('notification_type_id', $notificationTypeId)->exists();
    }

    /**
     * Get the number of checked off notifications for today.
     * 
     * @return int
     */
    public function getCheckedOffNotificationsCountAttribute(): int
    {
        $today = Carbon::now()->toDateString();

        return DailyCheckOff::where('user_id', $this->id)
            ->where('date', $today)
            ->where('is_done', true)
            ->count();
    }

    /**
     * Get the number of notification that the user has enabled
     * 
     * @return int
     */
    public function getEnabledNotificationsCountAttribute(): int
    {
        return $this->notificationPreferences->count();
    }

    /**
     * Get the users daily check offs
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dailyCheckOffs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DailyCheckOff::class);
    }

    /**
     * Handle deleting the user
     * 
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->weightMeasurements()->delete();
            $user->waterIntakeLogs()->delete();
            $user->notificationPreferences()->delete();
            $user->dailyCheckOffs()->delete();
        });
    }
}
