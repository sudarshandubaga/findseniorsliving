<section class="py-20 bg-gray-50/50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-[#1a1a1a] mb-4 tracking-tight">
                Our <span class="text-primary">Service Types</span>
            </h2>
            <div class="w-20 h-1.5 bg-primary mx-auto rounded-full"></div>
            <p class="mt-6 text-gray-500 max-w-2xl mx-auto text-lg leading-relaxed">
                Explore our comprehensive range of specialized senior care services tailored to provide comfort, safety,
                and a vibrant lifestyle for your loved ones.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse($service_types as $service)
                <div
                    class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 hover:-translate-y-2 flex flex-col items-center text-center">
                    <div
                        class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:rotate-6 transition-all duration-500">
                        <i data-lucide="heart"
                            class="w-8 h-8 text-primary group-hover:text-white transition-colors duration-500"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#1a1a1a] mb-3">{{ $service->name }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">
                        Quality care and support tailored to individual needs in a nurturing environment.
                    </p>
                    <a href="{{ route('listings.index', ['service' => $service->slug ?? $service->name]) }}"
                        class="mt-auto text-primary font-bold text-sm uppercase tracking-wider flex items-center group/link">
                        Learn More
                        <i data-lucide="chevron-right"
                            class="w-4 h-4 ml-1 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            @empty
                No records
            @endforelse
        </div>
    </div>
</section>