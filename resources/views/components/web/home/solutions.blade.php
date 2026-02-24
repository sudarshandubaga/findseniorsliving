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
                                <i data-lucide="clock-4" class="w-8 h-8"></i>

                            @elseif($sol['icon'] === 'briefcase')
                                <i data-lucide="briefcase" class="w-8 h-8"></i>

                            @elseif($sol['icon'] === 'trending-up')
                                <i data-lucide="trending-up" class="w-8 h-8"></i>

                            @elseif($sol['icon'] === 'lightbulb')
                                <i data-lucide="lightbulb" class="w-8 h-8"></i>

                            @elseif($sol['icon'] === 'chart')
                                <i data-lucide="bar-chart-3" class="w-8 h-8"></i>

                            @else
                                <i data-lucide="circle-check-big" class="w-8 h-8"></i>
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