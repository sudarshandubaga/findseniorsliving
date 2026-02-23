<section class="bg-primary py-20 text-white relative overflow-hidden">

    <!-- Background Effect -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-full h-full 
            bg-[radial-gradient(circle_at_center,_rgba(255,255,255,0.2),_transparent)]">
        </div>
    </div>

    <div class="container mx-auto grid grid-cols-2 md:grid-cols-4 gap-12 text-center relative z-10">

        @foreach($stats as $stat)
            <div class="border-r border-white/20 last:border-0 px-4">
                <h3 class="text-6xl font-black mb-4 tracking-tighter">
                    {{ $stat['value'] }}
                </h3>
                <p class="text-sm font-bold tracking-[0.2em] uppercase opacity-90">
                    {{ $stat['label'] }}
                </p>
            </div>
        @endforeach

    </div>

</section>