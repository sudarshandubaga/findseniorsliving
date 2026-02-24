<footer x-data class="bg-[#0a0a0a] text-white pt-28 pb-12">

    <div class="container mx-auto grid md:grid-cols-2 lg:grid-cols-6 gap-12 mb-20">

        <!-- Logo + About -->
        <div class="lg:col-span-2">
            <div class="flex items-center space-x-3 mb-10">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div class="bg-primary p-2 rounded-sm shadow-lg">
                        <i data-lucide="bar-chart-3" class="text-white w-7 h-7"></i>
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
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary transition-all duration-300 cursor-pointer group">
                        <i data-lucide="{{ $social }}"
                            class="w-4 h-4 text-gray-400 group-hover:text-white transition-colors"></i>
                    </a>
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
                            <i data-lucide="chevron-right"
                                class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform text-primary/50"></i>
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
                <a href="{{ url('/legal/privacy-policy') }}"
                    class="hover:text-primary transition-colors flex items-center space-x-1">
                    <i data-lucide="shield" class="w-3.5 h-3.5"></i>
                    <span>Privacy Policy</span>
                </a>
                <a href="{{ url('/legal/terms-conditions') }}"
                    class="hover:text-primary transition-colors flex items-center space-x-1">
                    <i data-lucide="file-text" class="w-3.5 h-3.5"></i>
                    <span>Terms of Service</span>
                </a>
                <a href="{{ url('/legal/disclaimer') }}"
                    class="hover:text-primary transition-colors flex items-center space-x-1">
                    <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i>
                    <span>Disclaimer</span>
                </a>
            </div>

            <!-- Scroll To Top -->
            <button @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
                class="mt-6 md:mt-0 bg-primary p-4 rounded-sm hover:bg-opacity-90 transition-all shadow-lg group">

                <i data-lucide="arrow-up"
                    class="text-white group-hover:-translate-y-1 transition-transform w-6 h-6"></i>
            </button>

        </div>
    </div>

</footer>