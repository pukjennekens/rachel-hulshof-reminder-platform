<div>
    @if($notificationTypes->isEmpty())
        <p>Je hebt op dit moment geen meldingen ingesteld, voeg er een paar toe via het klokje linksboven.</p>
    @else
        <div class="space-y-4">
            @foreach($notificationTypes as $notificationType)
                <button type="button" class="w-full py-2 px-4 rounded-lg bg-gray-100 text-left flex items-center justify-between" wire:key="{{ $notificationType->id }}" wire:click="toggleCheckOff({{ $notificationType->id }})">
                    <div class="inline-flex items-center gap-4">
                        <input type="checkbox" id="notification-{{ $notificationType->id }}" class="rounded-lg border border-black" {{ $this->isNotificationChecked($notificationType->id) ? 'checked' : '' }}>

                        <div class="flex flex-col">
                            <strong class="{{ $this->isNotificationChecked($notificationType->id) ? 'line-through' : '' }}">{{ $notificationType->name }}</strong>

                            @if(!$notificationType->receive_notification)
                                <span class="text-xs italic">Meldingen uitgeschakeld</span>
                            @endif
                        </div>
                    </div>

                    @isset($notificationTimes[$notificationType->id])
                        <span>{{ $notificationTimes[$notificationType->id] }}</span>
                    @endisset
                </button>
            @endforeach
        </div>
    @endif
</div>