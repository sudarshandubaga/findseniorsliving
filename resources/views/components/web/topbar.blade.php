<div class="bg-primary text-white py-2 text-xs hidden md:block">
    <div class="container flex justify-between items-center">
        <div class="flex space-x-6">
            <div class="flex items-center space-x-2">
                <i data-lucide="mail" class="w-3.5 h-3.5 opacity-80"></i>
                <span>{{ $siteEmail }}</span>
            </div>
            <div class="flex items-center space-x-2">
                <i data-lucide="map-pin" class="w-3.5 h-3.5 opacity-80"></i>
                <span>{{ $siteAddress }}</span>
            </div>
        </div>
        <div class="flex items-center space-x-6">
            <div class="flex items-center space-x-2 border-r border-white/20 pr-6">
                <i data-lucide="phone" class="w-3.5 h-3.5 opacity-80"></i>
                <span>Call us: <strong>{{ $sitePhone }}</strong></span>
            </div>

            <!-- Country Dropdown -->
            <div x-data="{ open: false }" class="relative">
                @php
                    $currentCountryData = $availableCountries[(string)($currentCountryName ?? '')] ?? reset($availableCountries);
                @endphp
                <button @click="open = !open" @click.away="open = false"
                    class="flex items-center space-x-2 hover:opacity-80 transition-opacity uppercase tracking-widest font-bold">
                    <img src="{{ $currentCountryData['flag'] }}" class="w-5 h-3.5 object-cover rounded-sm">
                    <span>{{ $currentCountryName }}</span>
                    <i data-lucide="chevron-down" class="w-3 h-3 transition-transform"
                        :class="open ? 'rotate-180' : ''"></i>
                </button>

                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    class="absolute right-0 mt-3 w-56 bg-white text-gray-800 shadow-2xl rounded-sm z-[60] py-2 border-t-4 border-primary">
                    <div class="px-4 py-2 border-b border-gray-100 mb-1">
                        <span class="text-[10px] uppercase tracking-widest text-gray-400 font-bold">Select Country</span>
                    </div>
                    @foreach($availableCountries as $name => $data)
                    <form action="{{ route('set-country') }}" method="POST" class="m-0">
                        @csrf
                        <input type="hidden" name="country" value="{{ $name }}">
                        <button type="submit"
                            class="w-full flex items-center space-x-3 px-4 py-3 hover:bg-gray-50 transition-colors text-left group">
                            <img src="{{ $data['flag'] }}" class="w-5 h-3.5 object-cover rounded-sm shadow-sm">
                            <span
                                class="text-xs uppercase tracking-wider {{ $currentCountryName === $name ? 'font-black text-primary' : 'font-bold text-gray-600' }} group-hover:text-primary">
                                {{ $name }}
                            </span>
                            @if($currentCountryName === $name)
                            <div class="ml-auto">
                                <i data-lucide="check" class="w-3 h-3 text-primary"></i>
                            </div>
                            @endif
                        </button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>