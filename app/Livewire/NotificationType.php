<?php

namespace App\Livewire;

use App\Models\NotificationType as ModelsNotificationType;
use Livewire\Attributes\Validate;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class NotificationType extends ModalComponent
{
    /**
     * @var ModelsNotificationType
     */
    public ModelsNotificationType $notificationType;

    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required')]
    public $default_time;

    #[Validate('required|string|max:255')]
    public $heading;

    #[Validate('required|string|max:255')]
    public $subheading;

    public function mount($notificationTypeId = null)
    {
        $this->notificationType = $notificationTypeId
            ? ModelsNotificationType::find($notificationTypeId)
            : new ModelsNotificationType();

        $this->name         = $this->notificationType->name;
        $this->default_time = $this->notificationType->default_time;
    }

    public function save()
    {
        $this->validate();

        $this->notificationType->name         = $this->name;
        $this->notificationType->default_time = $this->default_time;
        $this->notificationType->save();

        $this->dispatch('notify', type: 'success', message: 'Het nieuwe notificatietype is opgeslagen!');
        $this->dispatch('closeModal');
        $this->dispatch('notification-type-updated');
    }

    public function render()
    {
        return view('livewire.notification-type');
    }
}
