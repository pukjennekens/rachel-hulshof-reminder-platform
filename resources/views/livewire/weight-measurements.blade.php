<div>
    @if(!$weightMeasurements->isEmpty())
        <div class="bg-primary p-6 flex flex-col min-h-1/2">
            <h2 class="text-3xl mb-2">Gewicht logboek</h2>

            <div class="h-full overflow-y-auto mb-4">
                <table class="w-full">
                    @foreach( $weightMeasurements->sortBy('date') as $weightMeasurement )
                        <tr class="border-b-2 border-b-black">
                            <th class="pb-2 pt-2 text-left">{{ $weightMeasurement->date->format('d-m-Y') }}</th>

                            <td class="pb-2 pt-2 text-right">
                                {{ number_format( $weightMeasurement->weight, 1, ',', '.' ) }} kg
                            </td>

                            <td class="text-right w-[1%] pl-4">
                                <x-button 
                                    type="button"
                                    class="!px-2"
                                    wire:click="$dispatch('openModal', {component: 'edit-weight-measurement', arguments: {weightMeasurementId: {{ $weightMeasurement->id }}}})"
                                >
                                    <i class="fas fa-pen"></i>
                                </x-button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="text-center" x-data="{ confirm: false }">
                <p class="font-bold">Wil je opnieuw beginnen? Klik dan op reset.</p>

                <x-button type="button" class="mt-4" x-on:click="confirm = true;" x-cloak x-show="!confirm">
                    Reset
                </x-button>

                <x-button 
                    type="button"
                    class="mt-4"
                    wire:click="$dispatch('openModal', {component: 'reset-weight-measurements'})"
                    wire:loading.class="loading"
                    x-cloak
                    x-show="confirm"
                    x-on:click="confirm = false;"
                    x-on:click.away="confirm = false;"
                    x-on:keydown.escape.window="confirm = false;"
                >
                    Zeker?
                </x-button>
            </div>
        </div>
    @endif
</div>