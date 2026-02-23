<section x-data="{ videoOpen: false }" class="py-24 bg-white relative">

    <!-- Video Modal -->
    <div x-show="videoOpen" x-transition class="fixed inset-0 bg-black/80 flex items-center justify-center z-50 p-6">

        <div @click.away="videoOpen = false" class="bg-black w-full max-w-4xl aspect-video relative">

            <button @click="videoOpen = false" class="absolute -top-10 right-0 text-white text-3xl">
                ✕
            </button>

            <iframe class="w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Company Video"
                frameborder="0" allowfullscreen>
            </iframe>

        </div>
    </div>

    <div class="container mx-auto grid lg:grid-cols-2 gap-20 items-center">

        <!-- Left Content -->
        <div>
            <h2 class="text-5xl font-bold text-[#1a1a1a] mb-8 leading-tight tracking-tight">
                Why People Choose Our Company
            </h2>

            <p class="text-gray-500 mb-12 leading-relaxed text-lg">
                We're on a mission to start a conversation with your customers in this fast connected world.
                Let's discover, build and grow your digital business.
            </p>

            <div class="space-y-10">

                @foreach($features as $feature)
                    <div class="flex items-start space-x-6">

                        <div
                            class="bg-primary w-14 h-14 flex items-center justify-center rounded-sm shadow-lg mt-1 text-white">

                            @if($feature['icon'] === 'lightbulb')
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 3a6 6 0 00-3 11v2h6v-2a6 6 0 00-3-11zM9 21h6" />
                                </svg>

                            @elseif($feature['icon'] === 'check-circle')
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2l4-4M12 22a10 10 0 100-20 10 10 0 000 20z" />
                                </svg>

                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v6h6M20 20v-6h-6M5 19A9 9 0 1019 5" />
                                </svg>
                            @endif

                        </div>

                        <div>
                            <h4 class="text-2xl font-bold text-[#1a1a1a] mb-2">
                                {{ $feature['title'] }}
                            </h4>

                            <p class="text-gray-500 leading-relaxed">
                                Cupiditate lobortis quis eget, luctus at vestibulum vitae ornare pellentesque ipsum
                            </p>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>

        <!-- Right Image Section -->
        <div class="relative group">

            <div class="rounded-sm overflow-hidden shadow-2xl">
                <img src="https://picsum.photos/seed/why/1000/800" alt="Team working" class="w-full h-full object-cover"
                    referrerpolicy="no-referrer">
            </div>

            <!-- Play Button -->
            <div class="absolute inset-0 flex items-center justify-center">

                <button @click="videoOpen = true"
                    class="bg-primary text-white w-24 h-24 rounded-full flex items-center justify-center shadow-2xl relative z-10 hover:scale-110 transition-all">

                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" viewBox="0 0 24 24"
                        class="ml-1">
                        <path d="M8 5v14l11-7z" />
                    </svg>

                    <span class="absolute inset-0 rounded-full bg-primary animate-ping opacity-25"></span>

                </button>

            </div>

            <!-- Watch Button -->
            <div class="absolute bottom-10 left-0 right-0 flex justify-center">

                <button @click="videoOpen = true"
                    class="bg-primary text-white px-12 py-5 rounded-sm font-bold text-xl shadow-2xl hover:bg-opacity-90 transition-all uppercase tracking-wider">

                    Watch The Video

                </button>

            </div>

        </div>

    </div>

</section>