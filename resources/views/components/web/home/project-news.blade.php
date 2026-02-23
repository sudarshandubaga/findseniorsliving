<section class="py-24 bg-white">
    <div class="container mx-auto">

        <!-- Section Header -->
        <div class="text-center mb-20">
            <h2 class="text-5xl font-bold text-[#1a1a1a] mb-6 tracking-tight">
                Project News And Tips
            </h2>
            <p class="text-gray-500 text-lg">
                Our latest blog, client feedback, your request, global management consulting firm that serves a private
            </p>
        </div>

        <!-- Project Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach(range(1, 6) as $n)
                <div class="overflow-hidden rounded-sm shadow-lg group relative">

                    <img src="https://picsum.photos/seed/proj{{ $n }}/800/600" alt="Project {{ $n }}"
                        class="w-full aspect-[4/3] object-cover group-hover:scale-110 transition-transform duration-700"
                        referrerpolicy="no-referrer" />

                    <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 transition-colors duration-500">
                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>