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
        <div>
            <div class="flex items-center space-x-2">
                <i data-lucide="phone" class="w-3.5 h-3.5 opacity-80"></i>
                <span>Call us: <strong>{{ $sitePhone }}</strong></span>
            </div>
        </div>
    </div>
</div>