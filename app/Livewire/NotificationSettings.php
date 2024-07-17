<?php

namespace App\Livewire;

use App\Models\NotificationType;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class NotificationSettings extends Component
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $notificationTypes;

    /**
     * @var array<int, string>
     */
    public $notificationTimes = [];

    /**
     * @var array<int, bool>
     */
    public $receiveNotifications = [];

    public function mount()
    {
        $this->notificationTypes = NotificationType::all();

        $this->notificationTimes    = auth()->user()->notificationPreferences->pluck('notification_time', 'notification_type_id')->toArray();
        $this->receiveNotifications = auth()->user()->notificationPreferences->pluck('receive_notification', 'notification_type_id')->toArray();

        $this->notificationTypes->each(function ($notificationType) {
            if (!array_key_exists($notificationType->id, $this->notificationTimes)) {
                $this->notificationTimes[$notificationType->id] = $notificationType->default_time;
            }
        });

        $this->notificationTypes = $this->notificationTypes->sortBy(function ($notificationType) {
            return $this->notificationTimes[$notificationType->id];
        });
    }

    public function updatedNotificationTimes()
    {
        $this->notificationTypes = $this->notificationTypes->sortBy(function ($notificationType) {
            return $this->notificationTimes[$notificationType->id];
        });
    }

    public function toggleNotification($notificationTypeId)
    {
        // If alraedy connected to the user, detach it, otherwise attach it
        if (!auth()->user()->hasNotificationPreferenceEnabled($notificationTypeId)) {
            $default_time = NotificationType::find($notificationTypeId)->default_time;

            auth()->user()->notificationPreferences()->create([
                'notification_type_id' => $notificationTypeId,
                'notification_time'    => $default_time,
            ]);

            $this->notificationTimes[$notificationTypeId] = $default_time;

            $this->dispatch('notify', type: 'success', message: 'Melding ingeschakeld');
        } else {
            auth()->user()->notificationPreferences()->where('notification_type_id', $notificationTypeId)->delete();

            $this->notificationTimes[$notificationTypeId] = NotificationType::find($notificationTypeId)->default_time;

            $this->dispatch('notify', type: 'success', message: 'Melding uitgeschakeld');
        }

        $this->dispatch('notification-toggled', $notificationTypeId);
    }

    public function updateNotification($notificationTypeId, $time = null, $receive_notification = null)
    {
        if (!auth()->user()->hasNotificationPreferenceEnabled($notificationTypeId)) {
            $this->dispatch('notify', type: 'error', message: 'Melding is niet ingeschakeld');
            return;
        }

        $data = [];

        if($time !== null && preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $time)) $data['notification_time'] = $time;

        if($receive_notification !== null) $data['receive_notification'] = $receive_notification;

        auth()->user()->notificationPreferences()->where('notification_type_id', $notificationTypeId)->update($data);

        if($time !== null && preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $time)) $this->notificationTimes[$notificationTypeId] = $time;
        if($receive_notification !== null) $this->receiveNotifications[$notificationTypeId] = $receive_notification;

        $this->dispatch('notify', type: 'success', message: 'Melding bijgewerkt');

        $this->dispatch('notification-updated', $notificationTypeId);
    }

    public function render()
    {
        return view('livewire.notification-settings');
    }
}
