<footer x-data class="bg-white text-[#1a1a1a] pt-28 pb-12 border-t border-gray-100">

    <div class="container mx-auto grid md:grid-cols-2 lg:grid-cols-6 gap-12 mb-20">

        <!-- Logo + About -->
        <div class="lg:col-span-2">
            <div class="flex items-center space-x-3 mb-10">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    @if($siteLogo)
                        <img src="{{ asset('storage/' . $siteLogo) }}" alt="{{ $siteTitle }}" class="h-20">
                    @else
                        <img src="{{ asset('images/logo.png') }}" alt="{{ $siteTitle }}" class="h-20">
                    @endif
                </a>
            </div>

            <p class="text-gray-500 leading-relaxed mb-10 text-lg max-w-md">
                {{ $footerDescription }}
            </p>

            <!-- Social Icons -->
            <div class="flex space-x-5">
                @if(isset($socialLinks['social_facebook']))
                    <a href="{{ $socialLinks['social_facebook'] }}" target="_blank"
                        class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center hover:bg-primary transition-all duration-300 cursor-pointer group shadow-sm hover:shadow-lg hover:-translate-y-1">
                        <i data-lucide="facebook" class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors"></i>
                    </a>
                @endif
                @if(isset($socialLinks['social_twitter']))
                    <a href="{{ $socialLinks['social_twitter'] }}" target="_blank"
                        class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center hover:bg-primary transition-all duration-300 cursor-pointer group shadow-sm hover:shadow-lg hover:-translate-y-1">
                        <i data-lucide="twitter" class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors"></i>
                    </a>
                @endif
                @if(isset($socialLinks['social_instagram']))
                    <a href="{{ $socialLinks['social_instagram'] }}" target="_blank"
                        class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center hover:bg-primary transition-all duration-300 cursor-pointer group shadow-sm hover:shadow-lg hover:-translate-y-1">
                        <i data-lucide="instagram" class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors"></i>
                    </a>
                @endif
                @if(isset($socialLinks['social_linkedin']))
                    <a href="{{ $socialLinks['social_linkedin'] }}" target="_blank"
                        class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center hover:bg-primary transition-all duration-300 cursor-pointer group shadow-sm hover:shadow-lg hover:-translate-y-1">
                        <i data-lucide="linkedin" class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors"></i>
                    </a>
                @endif
            </div>
        </div>

        <!-- Dynamic Menus -->
        @foreach($footerMenus as $menu)
            <div>
                <h4 class="text-lg font-black mb-10 border-b-2 border-primary/20 pb-4 inline-block pr-12 whitespace-nowrap uppercase tracking-widest text-primary">
                    {{ $menu['title'] }}
                </h4>

                <ul class="space-y-4 text-gray-500 text-sm font-bold">
                    @foreach($menu['links'] as $link)
                        <li class="hover:text-primary transition-all duration-300 flex items-center group">
                            <i data-lucide="chevron-right"
                                class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform text-primary/30"></i>
                            @if(is_array($link))
                                <a href="{{ $link['url'] }}" class="cursor-pointer">{{ $link['label'] }}</a>
                            @else
                                <span class="cursor-pointer">{{ $link }}</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

    </div>

    <!-- Bottom Section -->
    <div class="border-t border-gray-100 pt-10 text-gray-400 text-xs font-bold uppercase tracking-widest">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">

            <p>
                © {{ date('Y') }} {{ $siteTitle }}. All Rights Reserved.
            </p>

            <div class="flex space-x-8 mt-6 md:mt-0">
                <a href="{{ route('pages.show', 'privacy-policy') }}"
                    class="hover:text-primary transition-colors flex items-center space-x-2">
                    <i data-lucide="shield" class="w-4 h-4"></i>
                    <span>Privacy Policy</span>
                </a>
                <a href="{{ route('pages.show', 'terms-and-conditions') }}"
                    class="hover:text-primary transition-colors flex items-center space-x-2">
                    <i data-lucide="file-text" class="w-4 h-4"></i>
                    <span>Terms of Service</span>
                </a>
                <a href="{{ route('pages.show', 'disclaimer') }}"
                    class="hover:text-primary transition-colors flex items-center space-x-2">
                    <i data-lucide="alert-circle" class="w-4 h-4"></i>
                    <span>Disclaimer</span>
                </a>
            </div>

            <!-- Scroll To Top -->
            <button @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
                class="mt-8 md:mt-0 bg-primary text-white p-5 rounded-2xl hover:bg-primary-dark transition-all shadow-xl shadow-primary/20 group hover:-translate-y-2">
                <i data-lucide="arrow-up"
                    class="group-hover:-translate-y-1 transition-transform w-6 h-6"></i>
            </button>

        </div>
    </div>

</footer>