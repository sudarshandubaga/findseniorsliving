<section class="py-20 bg-gray-50/50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-extrabold text-[#1a1a1a] mb-2 tracking-tight">
                    Featured <span class="text-primary">Elderly Lawyers</span>
                </h2>
                <div class="w-20 h-1.5 bg-primary rounded-full"></div>
                <p class="mt-4 text-gray-500 text-lg">
                    Expert legal protection for seniors and their families.
                </p>
            </div>
            <div class="flex items-center gap-8">
                <div class="flex gap-2" id="lawyers-nav"></div>
                <a href="#"
                    class="text-primary font-bold text-sm uppercase tracking-wider flex items-center hover:underline group whitespace-nowrap">
                    Find A Lawyer
                    <i data-lucide="arrow-right"
                        class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>

        <div class="featured-lawyers-slider -mx-2">
            @foreach($lawyers as $lawyer)
                <div class="px-2 pb-6">
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 flex flex-col h-full">
                        <!-- Header -->
                        <div class="p-8 pb-4 flex flex-col items-center text-center">
                            <div
                                class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mb-6 group-hover:bg-primary transition-all duration-500 overflow-hidden relative">
                                @if($lawyer->image)
                                    <img src="{{ $lawyer->image }}" alt="{{ $lawyer->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <i data-lucide="user"
                                        class="w-12 h-12 text-primary group-hover:text-white transition-colors duration-500"></i>
                                @endif
                                <div
                                    class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity">
                                </div>
                            </div>

                            <h3 class="text-xl font-bold text-[#1a1a1a] mb-1 group-hover:text-primary transition-colors">
                                {{ $lawyer->name }}
                            </h3>
                            <p class="text-primary font-bold text-[10px] uppercase tracking-widest mb-4">
                                {{ $lawyer->company ?: 'Legal Professional' }}
                            </p>

                            <div class="flex items-center text-gray-400 text-xs space-x-2">
                                <i data-lucide="map-pin" class="w-3.5 h-3.5 text-primary/60"></i>
                                <span>{{ $lawyer->city }}, {{ $lawyer->state }}</span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="px-8 pb-8 flex flex-col flex-grow text-center">
                            <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">
                                {{ Str::limit(strip_tags($lawyer->description), 120) }}
                            </p>

                            <div class="mt-auto pt-6 border-t border-gray-100 flex flex-col gap-3">
                                <a href="{{ $lawyer->profile_url ?: '#' }}" target="_blank"
                                    class="text-[#1a1a1a] text-[10px] font-bold uppercase tracking-widest hover:text-primary transition-colors">
                                    View Full Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>