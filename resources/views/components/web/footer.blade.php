<footer x-data class="bg-[#0a0a0a] text-white pt-28 pb-12">

    <div class="container mx-auto grid md:grid-cols-2 lg:grid-cols-6 gap-12 mb-20">

        <!-- Logo + About -->
        <div class="lg:col-span-2">
            <div class="flex items-center space-x-3 mb-10">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div class="bg-primary p-2 rounded-sm shadow-lg">
                        <!-- Simple BarChart Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="28" height="28" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3v18h18M9 17V9m4 8V5m4 12v-6" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-black leading-none tracking-tighter">
                            Finaleyas
                        </h1>
                        <p class="text-[10px] uppercase tracking-[0.3em] text-gray-400 font-black">
                            Financial Service
                        </p>
                    </div>
                </a>
            </div>

            <p class="text-gray-500 leading-relaxed mb-10 text-lg max-w-md">
                Your trusted partner in finding the perfect senior living options.
                We provide expert guidance and comprehensive resources for families.
            </p>

            <!-- Social Icons -->
            <div class="flex space-x-5">
                @foreach(['facebook', 'twitter', 'instagram', 'linkedin'] as $social)
                    <div
                        class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary transition-all duration-300 cursor-pointer group">
                        <span class="text-sm uppercase">{{ substr($social, 0, 1) }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Dynamic Menus -->
        @foreach($footerMenus as $menu)
            <div>
                <h4 class="text-xl font-bold mb-10 border-b-2 border-primary/30 pb-4 inline-block pr-12 whitespace-nowrap">
                    {{ $menu['title'] }}
                </h4>

                <ul class="space-y-4 text-gray-500 text-base">
                    @foreach($menu['links'] as $link)
                        <li class="hover:text-primary cursor-pointer transition-all duration-300 flex items-center group">
                            <span class="mr-2 group-hover:translate-x-1 transition-transform">›</span>
                            {{ $link }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

    </div>

    <!-- Bottom Section -->
    <div class="border-t border-white/5 pt-10 text-center text-gray-500 text-sm">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">

            <p>
                © {{ date('Y') }} Finaleyas Consulting. All Rights Reserved.
            </p>

            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="{{ url('/legal/privacy-policy') }}" class="hover:text-primary transition-colors">
                    Privacy Policy
                </a>
                <a href="{{ url('/legal/terms-conditions') }}" class="hover:text-primary transition-colors">
                    Terms of Service
                </a>
                <a href="{{ url('/legal/disclaimer') }}" class="hover:text-primary transition-colors">
                    Disclaimer
                </a>
            </div>

            <!-- Scroll To Top -->
            <button @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
                class="mt-6 md:mt-0 bg-primary p-4 rounded-sm hover:bg-opacity-90 transition-all shadow-lg group">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="text-white group-hover:-translate-y-1 transition-transform" width="24" height="24"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                </svg>
            </button>

        </div>
    </div>

</footer>