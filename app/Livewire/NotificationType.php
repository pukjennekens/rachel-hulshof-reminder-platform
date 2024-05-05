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

    public $default_on = false;

    public function mount($notificationTypeId = null)
    {
        $this->notificationType = $notificationTypeId
            ? ModelsNotificationType::find($notificationTypeId)
            : new ModelsNotificationType();

        $this->name         = $this->notificationType->name;
        $this->default_time = $this->notificationType->default_time;
        $this->heading      = $this->notificationType->heading;
        $this->subheading   = $this->notificationType->subheading;
        $this->default_on   = $this->notificationType->default_on ?? false;
    }

    public function save()
    {
        $this->validate();

        $this->notificationType->name         = $this->name;
        $this->notificationType->default_time = $this->default_time;
        $this->notificationType->heading      = $this->heading;
        $this->notificationType->subheading   = $this->subheading;
        $this->notificationType->default_on   = $this->default_on ?? false;
        $this->notificationType->save();

        $this->dispatch('notify', type: 'success', message: 'Opgeslagen!');
        $this->dispatch('closeModal');
        $this->dispatch('notification-type-updated');
    }

    public function render()
    {
        return view('livewire.notification-type');
    }
}
