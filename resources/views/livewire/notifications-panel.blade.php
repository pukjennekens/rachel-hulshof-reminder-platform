<div class="space-y-4">
    @foreach($notificationTypes as $notificationType)
        <button type="button" class="w-full py-2 px-4 rounded-lg bg-gray-100 flex items-center justify-start gap-4" wire:key="{{ $notificationType->id }}" wire:click="toggleCheckOff({{ $notificationType->id }})">
            <input type="checkbox" id="notification-{{ $notificationType->id }}" class="rounded-lg border border-black" {{ $this->isNotificationChecked($notificationType->id) ? 'checked' : '' }}>
            <strong class="{{ $this->isNotificationChecked($notificationType->id) ? 'line-through' : '' }}">{{ $notificationType->name }}</strong>
        </button>
    @endforeach
</div>