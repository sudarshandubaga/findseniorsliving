<section class="py-24 bg-white">
    <div class="container mx-auto">

        <!-- Section Title -->
        <div class="text-center mb-20">
            <h2 class="text-5xl font-bold text-[#1a1a1a] tracking-tight">
                Our Global Activities
            </h2>
        </div>

        <!-- Cards -->
        <div class="grid md:grid-cols-3 gap-10">

            @foreach($activities as $act)
                <div
                    class="bg-gray-50 rounded-sm overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:-translate-y-3">

                    <!-- Image -->
                    <div class="relative h-64">
                        <img src="{{ $act['image'] }}" alt="{{ $act['title'] }}" class="w-full h-full object-cover"
                            referrerpolicy="no-referrer">

                        <!-- Icon -->
                        <div
                            class="absolute -bottom-8 left-8 bg-primary w-16 h-16 flex items-center justify-center clip-hexagon shadow-xl text-white">

                            @if($act['icon'] === 'briefcase')
                                <!-- Briefcase SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V7a2 2 0 00-2-2h-3V4a2 2 0 00-2-2h-2a2 2 0 00-2 2v1H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4" />
                                </svg>
                            @elseif($act['icon'] === 'trending-up')
                                <!-- Trending Up SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 17l6-6 4 4 8-8" />
                                </svg>
                            @else
                                <!-- User SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14a4 4 0 100-8 4 4 0 000 8zm0 2c-4 0-7 2-7 4v1h14v-1c0-2-3-4-7-4z" />
                                </svg>
                            @endif

                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-10 pt-14">
                        <h3 class="text-2xl font-bold text-[#1a1a1a] mb-2">
                            {{ $act['title'] }}
                        </h3>

                        <p class="text-primary text-sm font-bold mb-6">
                            {{ $act['subtitle'] }}
                        </p>

                        <p class="text-gray-500 text-sm leading-relaxed mb-8">
                            Amet commodo urna diam nunc nec lectus, justo purus enim in praesent
                            suscipit adipisic justo purus enim.
                        </p>

                        <a href="#"
                            class="bg-primary text-white px-8 py-3 rounded-sm text-sm font-bold uppercase tracking-widest hover:bg-opacity-90 transition-all inline-block">
                            Read More
                        </a>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
</section>