<?php

namespace App\Livewire;

use App\Models\DailyCheckOff;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class NotificationsPanel extends Component
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $notificationTypes;

    /**
     * @var array<int, string>
     */
    public array $notificationTimes;

    public function mount()
    {
        $this->loadNotificationTypes();
    }

    #[On('notification-toggled')]
    #[On('notification-updated')]
    public function loadNotificationTypes()
    {
        $this->notificationTypes = auth()->user()->notificationPreferences
            ->sortBy('notification_time')
            ->map(function ($notificationPreference) {
                $notificationType = $notificationPreference->notificationType;

                $this->notificationTimes[$notificationType->id] = Carbon::parse($notificationPreference->notification_time)->format('H:i');

                return $notificationType;
            });
    }


    /**
     * Check if the notification is checked off for today
     *
     * @param int $notificationTypeId
     * @return bool
     */
    public function isNotificationChecked($notificationTypeId)
    {
        $today = Carbon::now()->toDateString();

        return DailyCheckOff::where('user_id', auth()->user()->id)
            ->where('notification_type_id', $notificationTypeId)
            ->where('date', $today)
            ->where('is_done', true)
            ->exists();
    }

    /**
     * Toggle a check off for the notification
     * 
     * @param int $notificationTypeId
     * @return void
     */
    public function toggleCheckOff($notificationTypeId)
    {
        $today = Carbon::now()->toDateString();

        $checkOff = DailyCheckOff::where('user_id', auth()->user()->id)
            ->where('notification_type_id', $notificationTypeId)
            ->where('date', $today)
            ->first();

        if($checkOff) {
            $checkOff->is_done = !$checkOff->is_done;
            $checkOff->save();
        } else {
            DailyCheckOff::create([
                'user_id'              => auth()->user()->id,
                'notification_type_id' => $notificationTypeId,
                'date'                 => $today,
                'is_done'              => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.notifications-panel');
    }
}
