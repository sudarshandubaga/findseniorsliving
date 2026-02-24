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
                                <i data-lucide="briefcase" class="w-7 h-7"></i>
                            @elseif($act['icon'] === 'trending-up')
                                <i data-lucide="trending-up" class="w-7 h-7"></i>
                            @else
                                <i data-lucide="user" class="w-7 h-7"></i>
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