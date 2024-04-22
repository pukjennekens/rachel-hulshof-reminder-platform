<div class="space-y-4">
    @foreach($notificationTypes as $notificationType)
        <div class="py-2 px-4 rounded-lg bg-gray-100 flex items-center justify-start gap-4" wire:key="{{ $notificationType->id }}">
            <input type="checkbox" id="notification-{{ $notificationType->id }}" class="rounded-lg border border-black" wire:click="toggleCheckOff({{ $notificationType->id }})" {{ $this->isNotificationChecked($notificationType->id) ? 'checked' : '' }}>
            <strong>{{ $notificationType->name }}</strong>
        </div>
    @endforeach
</div>