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

                    @if(isset($item['link']))
                        <a href="{{ $item['link'] }}"
                            class="flex items-center space-x-1 cursor-pointer hover:text-primary py-2">
                            <span>{{ $item['title'] }}</span>
                            @if(isset($item['dropdown']))
                                <i data-lucide="chevron-down"
                                    class="w-3 h-3 group-hover:rotate-180 transition-transform duration-300"></i>
                            @endif
                        </a>
                    @else
                        <div class="flex items-center space-x-1 cursor-pointer hover:text-primary py-2">
                            <span>{{ $item['title'] }}</span>
                            @if(isset($item['dropdown']))
                                <i data-lucide="chevron-down"
                                    class="w-3 h-3 group-hover:rotate-180 transition-transform duration-300"></i>
                            @endif
                        </div>
                    @endif

                    <!-- Dropdown -->
                    @if(isset($item['dropdown']))
                        <div x-show="activeDropdown === '{{ $item['title'] }}'"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="absolute top-full left-0 w-64 bg-white shadow-2xl border-t-4 border-primary z-50">

                            <div class="py-2">
                                @foreach($item['dropdown'] as $sub)
                                    <a href="#"
                                        class="flex items-center justify-between px-6 py-4 text-sm font-bold text-[#1a1a1a] hover:bg-gray-50 hover:text-primary border-b border-gray-50 last:border-0 transition-colors">
                                        <span>{{ $sub }}</span>
                                        <i data-lucide="arrow-right"
                                            class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity"></i>
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
            class="flex items-center space-x-3 bg-primary text-white px-6 py-3 rounded-sm font-bold uppercase tracking-widest hover:bg-opacity-90 shadow-lg group">
            <i data-lucide="help-circle" class="w-5 h-5 group-hover:rotate-12 transition-transform"></i>
            <span>Get Support</span>
        </button>
    </div>

    <!-- Support Modal -->
    <div x-show="supportOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 p-4">

        <div @click.away="supportOpen = false" class="bg-white p-10 rounded-sm max-w-md w-full relative">

            <button @click="supportOpen = false"
                class="absolute top-6 right-6 text-gray-400 hover:text-primary transition-colors">
                <i data-lucide="x" class="w-6 h-6"></i>
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