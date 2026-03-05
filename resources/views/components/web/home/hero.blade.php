<section x-data="{
        current: 0,
        slides: @js($slides),
        next() {
            this.current = (this.current + 1) % this.slides.length
        },
        prev() {
            this.current = (this.current - 1 + this.slides.length) % this.slides.length
        }
    }" class="relative h-[500px] md:h-[700px] flex items-center overflow-hidden">

    <!-- Background Images -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="current === index" x-transition:enter="transition-opacity duration-1000"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="absolute inset-0 z-0">

            <img :src="slide.image_url" alt="Hero Background" class="w-full h-full object-cover brightness-[0.4]"
                referrerpolicy="no-referrer">
        </div>
    </template>

    <!-- Content -->
    <div class="container mx-auto relative z-10 text-center text-white">

        <template x-for="(slide, index) in slides" :key="'content-'+index">
            <div x-show="current === index" x-transition:enter="transition-all duration-700"
                x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition-all duration-700" x-transition:leave-start="opacity-100 -translate-y-6"
                x-transition:leave-end="opacity-0">
                <p class="text-primary text-sm font-black mb-4 uppercase tracking-[0.3em]" x-text="slide.subtitle"></p>
                <h2 class="text-4xl md:text-7xl font-bold mb-10 max-w-5xl mx-auto leading-tight tracking-tight"
                    x-text="slide.title">
                </h2>
            </div>
        </template>

    </div>

    <!-- Prev Button -->
    <button @click="prev"
        class="absolute left-8 top-1/2 -translate-y-1/2 text-white/30 hover:text-white transition-colors z-20 hidden md:block">

        <i data-lucide="chevron-left" class="w-16 h-16 stroke-1"></i>

    </button>

    <!-- Next Button -->
    <button @click="next"
        class="absolute right-8 top-1/2 -translate-y-1/2 text-white/30 hover:text-white transition-colors z-20 hidden md:block">

        <i data-lucide="chevron-right" class="w-16 h-16 stroke-1"></i>

    </button>

</section>