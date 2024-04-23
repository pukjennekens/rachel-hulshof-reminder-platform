<?php

namespace App\Livewire;

use App\Models\NotificationType;
use Livewire\Attributes\On;
use Livewire\Component;

class NotificationTypes extends Component
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $notificationTypes;

    #[On('notification-type-created')]
    #[On('notification-type-updated')]
    #[On('notification-type-deleted')]
    public function mount()
    {
        $this->notificationTypes = NotificationType::all();
    }

    public function deleteNotificationType($notificationTypeId)
    {
        NotificationType::find($notificationTypeId)->delete();

        $this->dispatch('notification-type-deleted');
        $this->dispatch('notify', type: 'success', message: 'Notificatie type succesvol verwijderd');
    }

    public function render()
    {
        return view('livewire.notification-types');
    }
}
