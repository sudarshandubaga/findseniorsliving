<nav x-data="{ activeDropdown: null, supportOpen: false }" class="bg-white py-6 sticky top-0 z-50 shadow-md">

    <div class="container mx-auto flex justify-between items-center">

        <!-- Logo -->
        <div class="flex items-center space-x-3">
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16">
            </a>
        </div>

        <!-- Menu -->
        <div class="hidden xl:flex items-center space-x-4 font-bold text-gray-800 uppercase text-xs">

            @foreach($menuItems as $item)

                <div class="relative" @mouseenter="activeDropdown = '{{ $item['title'] }}'"
                    @mouseleave="activeDropdown = null">

                    <div class="flex items-center space-x-1 cursor-pointer hover:text-primary py-2">
                        <span>{{ $item['title'] }}</span>

                        @if(isset($item['dropdown']))
                            <svg class="w-3 h-3 rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        @endif
                    </div>

                    <!-- Dropdown -->
                    @if(isset($item['dropdown']))
                        <div x-show="activeDropdown === '{{ $item['title'] }}'" x-transition
                            class="absolute top-full left-0 w-64 bg-white shadow-2xl border-t-4 border-primary z-50">

                            <div class="py-2">
                                @foreach($item['dropdown'] as $sub)
                                    <a href="#"
                                        class="block px-6 py-4 text-sm font-bold text-[#1a1a1a] hover:bg-gray-50 hover:text-primary border-b border-gray-50 last:border-0 transition-colors">
                                        {{ $sub }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

            @endforeach

        </div>

        <!-- Support Button -->
        <button @click="supportOpen = true"
            class="bg-primary text-white px-6 py-3 rounded-sm font-bold uppercase tracking-widest hover:bg-opacity-90 shadow-lg">
            Get Support
        </button>
    </div>

    <!-- Support Modal -->
    <div x-show="supportOpen" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 p-4">

        <div @click.away="supportOpen = false" class="bg-white p-10 rounded-sm max-w-md w-full relative">

            <button @click="supportOpen = false" class="absolute top-4 right-4 text-gray-400 hover:text-primary">
                ✕
            </button>

            <h3 class="text-3xl font-bold mb-6 text-[#1a1a1a]">Get Support</h3>
            <p class="text-gray-500 mb-8">
                How can we help you today? Our team is available 24/7 for your financial needs.
            </p>

            <form method="POST" action="#">
                @csrf
                <div class="space-y-4">
                    <input type="text" name="name" placeholder="Your Name"
                        class="w-full p-4 bg-gray-50 border border-gray-100 rounded-sm focus:ring-2 focus:ring-primary">

                    <input type="email" name="email" placeholder="Your Email"
                        class="w-full p-4 bg-gray-50 border border-gray-100 rounded-sm focus:ring-2 focus:ring-primary">

                    <textarea name="message" rows="4" placeholder="Message"
                        class="w-full p-4 bg-gray-50 border border-gray-100 rounded-sm focus:ring-2 focus:ring-primary"></textarea>

                    <button type="submit"
                        class="w-full bg-primary text-white py-4 rounded-sm font-bold uppercase tracking-widest">
                        Submit Request
                    </button>
                </div>
            </form>

        </div>
    </div>

</nav>