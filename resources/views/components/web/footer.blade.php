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
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>
                @endif
                @if(isset($socialLinks['social_twitter']))
                    <a href="{{ $socialLinks['social_twitter'] }}" target="_blank"
                        class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center hover:bg-primary transition-all duration-300 cursor-pointer group shadow-sm hover:shadow-lg hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors">
                            <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
                        </svg>
                    </a>
                @endif
                @if(isset($socialLinks['social_instagram']))
                    <a href="{{ $socialLinks['social_instagram'] }}" target="_blank"
                        class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center hover:bg-primary transition-all duration-300 cursor-pointer group shadow-sm hover:shadow-lg hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                    </a>
                @endif
                @if(isset($socialLinks['social_linkedin']))
                    <a href="{{ $socialLinks['social_linkedin'] }}" target="_blank"
                        class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center hover:bg-primary transition-all duration-300 cursor-pointer group shadow-sm hover:shadow-lg hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                            <rect width="4" height="12" x="2" y="9"></rect>
                            <circle cx="4" cy="4" r="2"></circle>
                        </svg>
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