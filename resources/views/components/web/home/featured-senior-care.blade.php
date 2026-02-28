<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-extrabold text-[#1a1a1a] mb-2 tracking-tight">
                    Featured <span class="text-primary">Senior Care</span>
                </h2>
                <div class="w-20 h-1.5 bg-primary rounded-full"></div>
                <p class="mt-4 text-gray-500 text-lg">
                    Discover highly-rated senior care facilities and services.
                </p>
            </div>
            <div class="flex items-center gap-8">
                <div class="flex gap-2" id="care-nav"></div>
                <a href="{{ route('listings.index') }}"
                    class="text-primary font-bold text-sm uppercase tracking-wider flex items-center hover:underline group whitespace-nowrap">
                    View All
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>

        <div class="featured-care-slider -mx-2">
            @foreach($listings as $listing)
                <div class="px-2 pb-6">
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 flex flex-col h-full">
                        <!-- Image -->
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ $listing->featured_image }}" alt="{{ $listing->name }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div
                                class="absolute top-4 left-4 bg-primary text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg">
                                Featured
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center text-gray-400 text-xs mb-3 space-x-4">
                                <span class="flex items-center">
                                    <i data-lucide="map-pin" class="w-3.5 h-3.5 mr-1.5 text-primary"></i>
                                    {{ $listing->city }}, {{ $listing->state }}
                                </span>
                            </div>

                            <h3
                                class="text-xl font-bold text-[#1a1a1a] mb-3 group-hover:text-primary transition-colors line-clamp-1">
                                {{ $listing->name }}
                            </h3>

                            <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-2">
                                {{ Str::limit(strip_tags($listing->content), 100) }}
                            </p>

                            <div class="mt-auto pt-6 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-primary font-bold text-sm">
                                    <i data-lucide="phone" class="w-4 h-4 inline mr-1"></i>
                                    Call Now
                                </span>
                                <a href="{{ $listing->url }}" target="_blank"
                                    class="bg-gray-50 text-[#1a1a1a] hover:bg-primary hover:text-white px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider transition-all">
                                    Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>