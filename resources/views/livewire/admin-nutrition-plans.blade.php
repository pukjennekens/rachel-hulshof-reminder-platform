<div class="card w-full bg-base-100 shadow-xl">
    <div class="card-body">
        <div class="flex flex-col sm:flex-row gap-2 items-start sm:items-center justify-between">
            <h2 class="card-title">Voedingsschema's:</h2>

            <button class="btn btn-primary btn-xs" wire:click="$dispatch('openModal', {component: 'admin-nutrition-plan'})">
                <i class="fas fa-plus"></i> Nieuw voedingsschema
            </button>
        </div>

        <div class="justify-end">
            <div class="overflow-x-auto">
                @if($nutritionPlans->isEmpty())
                    <div role="alert" class="alert alert-error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>Er zijn geen voedingsschema's gevonden.</span>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Naam</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nutritionPlans as $nutritionPlan)
                                    <tr class="hover">
                                        <th>{{ $loop->iteration }}</th>
                                        
                                        <td>{{ $nutritionPlan->name }}</td>
                                        
                                        <th class="text-right flex gap-2 justify-end">
                                            <button class="btn btn-sm btn-warning" wire:click="$dispatch('openModal', {component: 'admin-nutrition-plan', arguments: { nutritionPlanId: {{ $nutritionPlan->id }} }})">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <button 
                                                x-data="{ confirm: false }" 
                                                class="btn btn-sm btn-error"
                                                x-on:click="confirm == true ? @this.call('deleteNutritionPlan', {{ $nutritionPlan->id }}) : confirm = true"
                                                x-on:click.away="confirm = false"
                                                x-on:keydown.escape="confirm = false"
                                            >
                                                <i x-show="!confirm" class="fas fa-trash"></i>
                                                <i x-show="confirm" class="fas fa-check"></i>
                                            </button>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>