<div>
    <h3 class="text-3xl mb-2 mt-4">
        Herinneringen
    </h3>

    <p class="my-4">
        Vul een gewenst herinneringstijd in. Let op: De Slinc Shaper dient een halfuur tot een uur vóór het eten ingenomen te worden
    </p>

    <div class="space-y-4">
        @foreach( $notificationTypes as $notificationType )
            <div class="py-2 px-4 rounded-lg bg-gray-100 flex items-center justify-between gap-4">
                <strong>{{ $notificationType->name }}</strong>

                <div class="inline-flex items-center gap-6" wire:key="notification-{{ $notificationType->id }}">
                    @if(auth()->user()->hasNotificationPreferenceEnabled($notificationType->id))
                        <input type="time" class="rounded-lg border-none py-1 px-2" wire:model.fill="notificationTimes.{{ $notificationType->id }}" wire:change.debounce.500ms="updateNotification({{ $notificationType->id }}, $event.target.value)" />
                    @else
                        <input type="time" class="rounded-lg border-none py-1 px-2 cursor-not-allowed opacity-30 disabled:bg-gray-400" disabled value="{{ $notificationType->default_time }}" />
                    @endif

                    @if(auth()->user()->hasNotificationPreferenceEnabled($notificationType->id))
                        <button type="button" class="text-xl" wire:click="toggleNotification({{ $notificationType->id }})">
                            <i class="fa-solid fa-bell"></i>
                        </button>
                    @else
                        <button type="button" class="text-xl opacity-30 relative" wire:click="toggleNotification({{ $notificationType->id }})">
                            <i class="fa-solid fa-bell"></i>
                            <div class="absolute w-0.5 h-full bg-black top-0 left-1/2 transform -rotate-45 -translate-y-0.5"></div>
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>