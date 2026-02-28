<section class="py-24 bg-gray-50/50">
    <div class="container mx-auto px-4">

        <!-- Cities Section -->
        <div class="mb-20">
            <h2 class="flex items-center text-2xl font-bold text-[#1a1a1a] mb-10 tracking-tight uppercase">
                <i data-lucide="map" class="mr-3 text-primary w-6 h-6"></i>
                Browse Elderly Lawyers by <span class="text-primary ml-2">TOP CITIES</span>
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-x-8 gap-y-4">
                @foreach($cities as $city)
                    <a href="{{ route('lawyers.index', ['country' => $city['country_slug'], 'state' => $city['state_slug'], 'city' => $city['city_slug']]) }}"
                        class="group flex items-center text-[13px] text-gray-500 hover:text-primary transition-colors duration-300">
                        <span class="font-medium group-hover:underline">{{ $city['name'] }}</span>
                        <span class="ml-1 text-primary/60">({{ $city['count'] }})</span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- States Section -->
        <div>
            <h2 class="flex items-center text-2xl font-bold text-[#1a1a1a] mb-10 tracking-tight uppercase">
                <i data-lucide="map-pin" class="mr-3 text-primary w-6 h-6"></i>
                Browse Elderly Lawyers by <span class="text-primary ml-2">State</span>
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-x-8 gap-y-4">
                @foreach($states as $state)
                    <a href="{{ route('lawyers.index', ['country' => $state['country_slug'], 'state' => $state['slug']]) }}"
                        class="group flex items-center text-[13px] text-gray-500 hover:text-primary transition-colors duration-300">
                        <span class="font-medium group-hover:underline">{{ $state['name'] }}</span>
                        @if($state['count'] > 0)
                            <span class="ml-1 text-primary/60">({{ $state['count'] }})</span>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>

    </div>
</section>