@php
    // Team members array
    $members = [
        ['name' => 'Mae Hayes', 'role' => 'CEO & Founder of Consultoxer', 'img' => 'https://picsum.photos/seed/team1/400/500'],
        ['name' => 'Gage Ullrich', 'role' => 'CEO & Founder of Consultoxer', 'img' => 'https://picsum.photos/seed/team2/400/500'],
        ['name' => 'Zander Rohan', 'role' => 'CEO & Founder of Consultoxer', 'img' => 'https://picsum.photos/seed/team3/400/500'],
        ['name' => 'Mariam Will', 'role' => 'CEO & Founder of Consultoxer', 'img' => 'https://picsum.photos/seed/team4/400/500'],
        ['name' => 'John Doe', 'role' => 'Senior Consultant', 'img' => 'https://picsum.photos/seed/team5/400/500'],
        ['name' => 'Jane Smith', 'role' => 'Financial Advisor', 'img' => 'https://picsum.photos/seed/team6/400/500'],
    ];

    $itemsPerPage = 4;
    $totalPages = ceil(count($members) / $itemsPerPage);
    $currentPage = request()->get('page', 1);
    $currentPage = max(1, min($currentPage, $totalPages));
    $visibleMembers = array_slice($members, ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
@endphp

<section class="py-24 bg-white">
    <div class="container mx-auto">

        <!-- Header -->
        <div class="text-center mb-20">
            <h2 class="text-5xl font-bold text-[#1a1a1a] mb-6 tracking-tight">Our Expert Team</h2>
            <p class="text-gray-500 text-lg">
                Our team members, your request, global management consulting firm that serves a private
            </p>
        </div>

        <!-- Team Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10">
            @foreach($visibleMembers as $member)
                <div class="bg-[#fdf3f0] p-10 rounded-sm text-center border border-gray-100 group relative overflow-hidden">

                    <!-- Image -->
                    <div
                        class="w-full aspect-[4/5] mx-auto mb-8 rounded-sm overflow-hidden shadow-lg group-hover:scale-105 transition-transform duration-500">
                        <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover"
                            referrerpolicy="no-referrer" />
                    </div>

                    <!-- Socials -->
                    <div class="flex justify-center space-x-6 mb-8 text-gray-400">
                        <a href="#" class="hover:text-primary transition-colors group/icon">
                            <i data-lucide="facebook" class="w-5 h-5 group-hover/icon:scale-110 transition-transform"></i>
                        </a>
                        <a href="#" class="hover:text-primary transition-colors group/icon">
                            <i data-lucide="twitter" class="w-5 h-5 group-hover/icon:scale-110 transition-transform"></i>
                        </a>
                        <a href="#" class="hover:text-primary transition-colors group/icon">
                            <i data-lucide="linkedin" class="w-5 h-5 group-hover/icon:scale-110 transition-transform"></i>
                        </a>
                        <a href="#" class="hover:text-primary transition-colors group/icon">
                            <i data-lucide="instagram" class="w-5 h-5 group-hover/icon:scale-110 transition-transform"></i>
                        </a>
                    </div>

                    <!-- Name & Role -->
                    <h4 class="text-2xl font-bold text-[#1a1a1a] mb-2">{{ $member['name'] }}</h4>
                    <p class="text-sm text-gray-500 font-medium">{{ $member['role'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- Pagination Dots -->
        <div class="flex justify-center mt-16 space-x-3">
            @for($i = 1; $i <= $totalPages; $i++)
                <a href="?page={{ $i }}"
                    class="w-3 h-3 rounded-full transition-all duration-300 {{ $currentPage == $i ? 'bg-primary w-8' : 'bg-gray-300' }}">
                </a>
            @endfor
        </div>

    </div>
</section>