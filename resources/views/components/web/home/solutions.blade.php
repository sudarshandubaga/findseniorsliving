<section class="py-24 bg-gray-50">
    <div class="container mx-auto">

        <!-- Section Header -->
        <div class="text-center mb-20">
            <h2 class="text-5xl font-bold text-[#1a1a1a] mb-6 tracking-tight">
                Get Finance Solutions For Your Business
            </h2>
            <p class="text-gray-500 text-lg">
                We ready for your request global management consulting firm that serves a private
            </p>
        </div>

        <!-- Solutions Grid -->
        <div class="grid md:grid-cols-3 gap-10">

            @foreach($solutions as $sol)
                <div
                    class="bg-white p-12 rounded-sm shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 group">

                    <!-- Icon -->
                    <div class="mb-8 flex justify-center">
                        <div
                            class="w-20 h-20 bg-primary flex items-center justify-center clip-hexagon text-white shadow-lg group-hover:scale-110 transition-transform duration-500">

                            @if($sol['icon'] === 'clock')
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <circle cx="12" cy="12" r="10" stroke-width="2" />
                                    <path d="M12 6v6l4 2" stroke-width="2" stroke-linecap="round" />
                                </svg>

                            @elseif($sol['icon'] === 'briefcase')
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path d="M20 13V7a2 2 0 00-2-2h-3V4a2 2 0 00-2-2h-2a2 2 0 00-2 2v1H6a2 2 0 00-2 2v6"
                                        stroke-width="2" />
                                </svg>

                            @elseif($sol['icon'] === 'trending-up')
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path d="M3 17l6-6 4 4 8-8" stroke-width="2" stroke-linecap="round" />
                                </svg>

                            @elseif($sol['icon'] === 'lightbulb')
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path d="M12 3a6 6 0 00-3 11v2h6v-2a6 6 0 00-3-11z" stroke-width="2" />
                                </svg>

                            @elseif($sol['icon'] === 'chart')
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path d="M3 3v18h18M9 17V9m4 8V5m4 12v-6" stroke-width="2" />
                                </svg>

                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path d="M12 22a10 10 0 100-20 10 10 0 000 20z" stroke-width="2" />
                                </svg>
                            @endif

                        </div>
                    </div>

                    <!-- Title -->
                    <h3 class="text-2xl font-bold text-[#1a1a1a] text-center mb-4">
                        {{ $sol['title'] }}
                    </h3>

                    <!-- Description -->
                    <p class="text-gray-500 text-center mb-8 leading-relaxed">
                        Acepteur sintas haecate sed ipsums cupidates nondui proident
                        sunit culpa qui tempore officia sed ipsum tempor eserunt.
                    </p>

                    <!-- Button -->
                    <div class="text-center">
                        <a href="#"
                            class="text-primary font-bold text-sm uppercase tracking-widest hover:underline inline-flex items-center">
                            Read More
                        </a>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>