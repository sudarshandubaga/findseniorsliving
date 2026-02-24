@php
    $posts = [
        ['title' => 'Crafted & Crispy Design', 'date' => '30 August 2018', 'img' => 'https://picsum.photos/seed/blog1/800/500'],
        ['title' => 'Marketing Makes Business', 'date' => '30 August 2018', 'img' => 'https://picsum.photos/seed/blog2/800/500'],
        ['title' => 'we Close Our Company', 'date' => '30 August 2018', 'img' => 'https://picsum.photos/seed/blog3/800/500'],
    ];
@endphp

<section class="py-24 bg-white">
    <div class="container mx-auto">

        <!-- Header -->
        <div class="text-center mb-20">
            <h2 class="text-5xl font-bold text-[#1a1a1a] mb-6 tracking-tight">Our News And Tips</h2>
            <p class="text-gray-500 text-lg">Our latest blog, client feedback, your request, global management
                consulting firm that serves a private</p>
        </div>

        <!-- Blog Posts Grid -->
        <div class="grid md:grid-cols-3 gap-10">
            @foreach($posts as $post)
                <div class="group">
                    <div class="overflow-hidden rounded-sm mb-8 shadow-lg">
                        <img src="{{ $post['img'] }}" alt="{{ $post['title'] }}"
                            class="w-full aspect-[16/10] object-cover group-hover:scale-110 transition-transform duration-700"
                            referrerpolicy="no-referrer" />
                    </div>
                    <p class="text-primary text-sm font-black mb-3 uppercase tracking-widest">{{ $post['date'] }}</p>
                    <h3
                        class="text-2xl font-bold text-[#1a1a1a] mb-6 group-hover:text-primary transition-colors cursor-pointer leading-tight">
                        {{ $post['title'] }}
                    </h3>
                    <p class="text-gray-500 mb-8 leading-relaxed">
                        Acepteur sintas haecate sed ipsums cupidates nondui proident sunit culpa qui tempore officia sed
                        ipsum tempor eserunt.
                    </p>
                    <button
                        class="text-primary font-black text-sm flex items-center group-hover:translate-x-2 transition-transform uppercase tracking-widest">
                        <span>Continue Reading</span>
                        <i data-lucide="arrow-right" class="ml-2 w-4 h-4"></i>
                    </button>
                </div>
            @endforeach
        </div>

    </div>
</section>