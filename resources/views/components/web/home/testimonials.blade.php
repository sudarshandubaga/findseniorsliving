@php
    // Testimonials array
    $testimonials = [
        ['name' => 'Mizanur Rahman', 'role' => 'CEO, Themeearth', 'img' => 'https://picsum.photos/seed/user1/100/100'],
        ['name' => 'Gudrun Kunde', 'role' => 'CEO, Themeearth', 'img' => 'https://picsum.photos/seed/user2/100/100'],
        ['name' => 'Robert Schulist', 'role' => 'CEO, Themeearth', 'img' => 'https://picsum.photos/seed/user3/100/100'],
        ['name' => 'Alice Johnson', 'role' => 'Manager, TechCo', 'img' => 'https://picsum.photos/seed/user4/100/100'],
        ['name' => 'Bob Wilson', 'role' => 'Director, BuildIt', 'img' => 'https://picsum.photos/seed/user5/100/100'],
        ['name' => 'Charlie Brown', 'role' => 'Founder, Startup', 'img' => 'https://picsum.photos/seed/user6/100/100'],
    ];

    $itemsPerPage = 3;
    $totalPages = ceil(count($testimonials) / $itemsPerPage);
    $currentPage = request()->get('page', 1);
    $currentPage = max(1, min($currentPage, $totalPages));
    $visibleTestimonials = array_slice($testimonials, ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
@endphp

<section class="py-24 bg-[#1a1a1a] text-white relative overflow-hidden">

    <!-- Background -->
    <div class="absolute inset-0 opacity-5">
        <img src="https://picsum.photos/seed/testbg/1920/1080" alt="Background" class="w-full h-full object-cover"
            referrerpolicy="no-referrer" />
    </div>

    <div class="container relative z-10 mx-auto">

        <!-- Header -->
        <div class="text-center mb-20">
            <h2 class="text-5xl font-bold mb-6 tracking-tight">What Our Clients Say</h2>
            <p class="text-gray-400 text-lg">Our client feedback, your request, global management consulting firm that
                serves a private</p>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid md:grid-cols-3 gap-10">
            @foreach($visibleTestimonials as $t)
                <div
                    class="bg-white/5 p-12 rounded-sm backdrop-blur-md border border-white/10 hover:border-primary/50 transition-all duration-500 group">
                    <div class="flex items-center space-x-6 mb-8">
                        <div
                            class="w-16 h-16 rounded-full overflow-hidden border-2 border-primary/30 group-hover:border-primary transition-colors">
                            <img src="{{ $t['img'] }}" alt="{{ $t['name'] }}" class="w-full h-full object-cover"
                                referrerpolicy="no-referrer" />
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-300 italic leading-relaxed">
                                "Heelo i am dolor sit dipiscing elit. Curabidolor amet glavrida tellus quis lorem ipsum
                                services iamets toos best services."
                            </p>
                        </div>
                    </div>
                    <div class="flex space-x-1 text-primary mb-6">
                        @for($s = 1; $s <= 5; $s++)
                            <i data-lucide="star" class="w-4 h-4 fill-primary"></i>
                        @endfor
                    </div>
                    <h4 class="font-bold text-2xl mb-1">{{ $t['name'] }}</h4>
                    <p class="text-sm text-gray-500 font-medium">{{ $t['role'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- Pagination Dots -->
        <div class="flex justify-center mt-16 space-x-3">
            @for($i = 1; $i <= $totalPages; $i++)
                <a href="?page={{ $i }}"
                    class="w-3 h-3 rounded-full transition-all duration-300 {{ $currentPage == $i ? 'bg-primary w-8' : 'bg-white/20' }}">
                </a>
            @endfor
        </div>

    </div>
</section>