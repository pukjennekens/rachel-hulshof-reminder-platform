<x-faq-list>
    @if($nutritionPlans->isEmpty())
        <p class="bg-[#f7f7f7] p-4 rounded-md">Er zijn geen voedingsschema's gevonden.</p>
    @else
        @foreach($nutritionPlans as $nutritionPlan)
            <x-faq-list-item :title="$nutritionPlan->name">
                <div>
                    <p class="font-bold">Categorie A:</p>
                    <p>{{ $nutritionPlan->category_a }}</p>
                </div>

                <div>
                    <p class="font-bold">Categorie B:</p>
                    <p>{{ $nutritionPlan->category_b }}</p>
                </div>
            </x-faq-list-item>
        @endforeach
    @endif
</x-faq-list>
