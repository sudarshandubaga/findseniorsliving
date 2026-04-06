@extends('web.layouts.app')

@section('content')
<style>
    /* Premium scoping overrides */
    h1, h2, h3, h4, h5 { font-family: 'Inter', system-ui, sans-serif; letter-spacing: -0.02em; }
    p, li, div, section { font-family: 'Inter', system-ui, sans-serif; }
    ul.check-list li { position: relative; padding-left: 1.75rem; margin-bottom: 0.75rem; }
    ul.check-list li::before { 
        content: '✓'; 
        position: absolute; 
        left: 0; 
        color: #f97316;
        font-weight: bold;
    }
</style>

<!-- BREADCRUMB -->
<section class="py-4 bg-white border-b border-gray-100">
<div class="container mx-auto px-4 max-w-5xl">
<nav class="text-sm font-medium">
<ol class="list-reset flex items-center flex-wrap text-gray-500 gap-y-2">
<li><a href="/" class="text-orange-600 hover:text-orange-800 transition-colors flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg> Home</a></li>
<li><span class="mx-3 text-gray-300">/</span></li>
<li><a href="{{ route('country-demographics.index') }}" class="text-orange-600 hover:text-orange-800 transition-colors">United States</a></li>
<li><span class="mx-3 text-gray-300">/</span></li>
@if($state)
<li><a href="{{ route('country-demographics.state', $state->id) }}" class="text-orange-600 hover:text-orange-800 transition-colors">{{ $state->name }}</a></li>
<li><span class="mx-3 text-gray-300">/</span></li>
@endif
<li class="text-gray-800">{{ $demographic->city }}</li>
</ol>
</nav>
</div>
</section>

<!-- HERO -->
<section class="relative bg-gradient-to-br from-orange-50 to-[#ffedd5] py-20 text-center overflow-hidden">
<div class="absolute top-0 left-0 w-64 h-64 bg-orange-400 opacity-10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
<div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-500 opacity-10 rounded-full blur-3xl translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

<div class="container mx-auto px-4 max-w-5xl relative z-10">
<span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4 block">City Overview</span>
<h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 mb-6 leading-tight">Senior Care in <span class="text-orange-600">{{ $demographic->city }}</span>@if($state), {{ $state->name }}@endif</h1>
<p class="text-xl md:text-2xl text-gray-600 mb-10 max-w-3xl mx-auto leading-relaxed">Compare trusted home care, assisted living, and nursing services in {{ $demographic->city }}.</p>
<a href="#featured-care" class="inline-flex items-center justify-center bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 px-10 rounded-full text-lg shadow-xl shadow-orange-600/30 hover:-translate-y-1 transition-all duration-300">
    View Care Providers
    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
</a>
</div>
</section>

<!-- CITY DEMOGRAPHICS -->
<section class="py-20 bg-white border-b border-gray-100">
<div class="container mx-auto px-4 max-w-6xl">
<div class="text-center mb-12">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">{{ $demographic->city }} Senior Demographics</h2>
    <p class="text-gray-600 text-lg mt-4 max-w-2xl mx-auto">{{ $demographic->city }} has a growing senior population, increasing demand for in-home care, assisted living communities, and memory care services.</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 text-center mt-8">
<div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(249,115,22,0.1)] transition-all duration-300 group">
<div class="bg-orange-50 w-12 h-12 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
</div>
<p class="text-3xl font-black text-gray-900 mb-1">{{ number_format($demographic->population) }}</p>
<p class="text-gray-500 font-medium uppercase tracking-wider text-xs">Total Population</p>
</div>

<div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(249,115,22,0.1)] transition-all duration-300 group">
<div class="bg-orange-50 w-12 h-12 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
</div>
<p class="text-3xl font-black text-gray-900 mb-1">{{ $demographic->percent_65_plus }}%</p>
<p class="text-gray-500 font-medium uppercase tracking-wider text-xs">Age 65+</p>
</div>

<div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(249,115,22,0.1)] transition-all duration-300 group">
<div class="bg-orange-50 w-12 h-12 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
</div>
<p class="text-3xl font-black text-gray-900 mb-1">${{ number_format($demographic->median_household_income) }}</p>
<p class="text-gray-500 font-medium uppercase tracking-wider text-xs">Median Income</p>
</div>

<div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(249,115,22,0.1)] transition-all duration-300 group">
<div class="bg-orange-50 w-12 h-12 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
</div>
<p class="text-3xl font-black text-gray-900 mb-1">{{ $demographic->life_expectancy }} yr</p>
<p class="text-gray-500 font-medium uppercase tracking-wider text-xs">Life Expectancy</p>
</div>
</div>
</div>
</section>

<!-- COST & TYPES SECTION -->
<section class="py-20 bg-gray-50 border-b border-gray-100">
<div class="container mx-auto px-4 max-w-6xl">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

    <!-- LEFT: Types -->
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Types of Care Available</h2>
        <div class="bg-white border text-center border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:border-orange-200 rounded-3xl p-10 transition-all duration-300">
            <ul class="text-gray-700 space-y-4 text-lg font-medium text-left">
                <li class="flex items-center"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center mr-4 flex-shrink-0"><div class="w-3 h-3 bg-orange-600 rounded-full"></div></div> In-Home Personal Care</li>
                <li class="flex items-center"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center mr-4 flex-shrink-0"><div class="w-3 h-3 bg-orange-600 rounded-full"></div></div> Companion Care</li>
                <li class="flex items-center"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center mr-4 flex-shrink-0"><div class="w-3 h-3 bg-orange-600 rounded-full"></div></div> Dementia & Memory Care</li>
                <li class="flex items-center"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center mr-4 flex-shrink-0"><div class="w-3 h-3 bg-orange-600 rounded-full"></div></div> Respite Care</li>
                <li class="flex items-center"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center mr-4 flex-shrink-0"><div class="w-3 h-3 bg-orange-600 rounded-full"></div></div> Assisted Living ({{ $demographic->assisted_living_facilities }} locations)</li>
                <li class="flex items-center"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center mr-4 flex-shrink-0"><div class="w-3 h-3 bg-orange-600 rounded-full"></div></div> Nursing Homes ({{ $demographic->nursing_homes }} locations)</li>
            </ul>
        </div>
    </div>

    <!-- RIGHT: Costs -->
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Cost of Senior Care in {{ $demographic->city }}</h2>
        
        <div class="bg-gradient-to-br from-orange-600 to-orange-700 rounded-3xl p-8 shadow-xl text-white relative overflow-hidden">
            <div class="absolute right-0 top-0 opacity-10">
                <svg class="w-48 h-48 -mr-10 -mt-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg>
            </div>
            <div class="relative z-10 space-y-6">
                <div class="border-b border-orange-500/50 pb-4">
                    <p class="text-orange-100 text-sm uppercase tracking-wider mb-1">Home Care (Monthly Avg)</p>
                    <p class="text-3xl font-bold">${{ number_format($demographic->avg_home_care_cost) }}<span class="text-xl text-orange-200 font-normal"> / mo</span></p>
                </div>
                <div class="border-b border-orange-500/50 pb-4">
                    <p class="text-orange-100 text-sm uppercase tracking-wider mb-1">Home Care (Hourly Avg)</p>
                    <p class="text-3xl font-bold">${{ $demographic->hourly_rate_low }} - ${{ $demographic->hourly_rate_high }}<span class="text-xl text-orange-200 font-normal"> / hr</span></p>
                </div>
                <div>
                    <p class="text-orange-100 text-sm uppercase tracking-wider mb-1">Hospital Quality Rating</p>
                    <p class="text-3xl font-bold">{{ $demographic->hospital_quality_rating }}<span class="text-xl text-orange-200 font-normal"> / 5</span></p>
                </div>
            </div>
        </div>
        <p class="mt-6 text-gray-500 italic text-sm text-center">
            * Costs vary depending on neighborhood, care level, and provider availability within {{ $demographic->city }}.
        </p>
    </div>

</div>
</div>
</section>

<!-- FEATURED SENIOR CARE -->
<section id="featured-care" class="py-24 bg-white">
<div class="container mx-auto px-4 max-w-6xl">
<div class="text-center mb-16">
    <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-2 block">Providers</span>
    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Featured Senior Care in {{ $demographic->city }}</h2>
    <p class="text-gray-600 text-lg max-w-2xl mx-auto">Explore trusted and verified senior care providers serving families in {{ $demographic->city }}.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
@if(count($featuredListings) > 0)
    @foreach($featuredListings as $listing)
    <div class="flex flex-col bg-white border border-gray-100 rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group">
        @if($listing->is_featured)
        <div class="absolute top-0 right-0 bg-amber-400 text-amber-900 text-xs font-bold px-3 py-1 rounded-bl-xl tracking-wider uppercase">Featured</div>
        @endif
        
        <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center text-orange-600 mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
        </div>
        
        <h5 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-orange-600 transition-colors">{{ $listing->name }}</h5>
        <p class="text-gray-500 text-sm mb-auto flex items-start leading-relaxed">
            <svg class="w-4 h-4 mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            {{ $listing->address ?? 'Address not available' }}, {{ $listing->city }}
        </p>
        
        <div class="mt-6 pt-6 border-t border-gray-100 space-y-3">
            @if(isset($listing->rating_point) && $listing->rating_point > 0)
            <div class="flex items-center">
                <div class="flex items-center text-amber-400 mr-2">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
                <span class="font-bold text-gray-900">{{ $listing->rating_point }}</span>
            </div>
            @endif
            
            <div class="flex gap-3">
                <a href="{{ route('listings.index', ['country' => 'us', 'city' => strtolower(str_replace(' ', '-', $demographic->city))]) }}" class="flex-1 text-center border border-gray-200 text-gray-700 hover:bg-gray-50 font-medium py-2 rounded-lg text-sm transition-colors">Profile</a>
                @if(isset($listing->phone) && $listing->phone)
                <a href="tel:{{ $listing->phone }}" class="flex-1 text-center bg-orange-600 hover:bg-orange-700 text-white font-medium py-2 rounded-lg text-sm transition-colors shadow-md">Call Now</a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
@else
    <div class="col-span-full text-center py-12 px-4 rounded-3xl bg-gray-50 border border-gray-100">
        <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
        <p class="text-gray-500 font-medium">No featured providers available in this city right now.</p>
    </div>
@endif
</div>

<div class="text-center mt-12">
<a href="{{ route('listings.index', ['country' => 'us', 'city' => strtolower(str_replace(' ', '-', $demographic->city))]) }}" class="inline-flex items-center justify-center bg-gray-900 hover:bg-black text-white font-bold py-4 px-10 rounded-full text-lg shadow-lg hover:-translate-y-1 transition-all duration-300">
Browse All Senior Care in {{ $demographic->city }}
<svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
</a>
</div>

</div>
</section>

<!-- NEARBY CITIES -->
@if(count($nearbyCities) > 0)
<section class="py-20 bg-gray-50 border-t border-gray-100">
<div class="container mx-auto px-4 max-w-6xl">
<div class="text-center mb-12">
    <h2 class="text-3xl font-bold text-gray-900">Senior Care Near {{ $demographic->city }}</h2>
</div>
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
@foreach($nearbyCities as $nearby)
<a href="{{ route('country-demographics.show', $nearby->id) }}" class="bg-white border border-gray-200 rounded-xl px-4 py-4 text-center font-bold text-gray-700 hover:border-orange-200 hover:text-orange-600 hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex items-center justify-center">
    {{ $nearby->city }}
</a>
@endforeach
</div>
</div>
</section>
@endif

<!-- FAQ & CTA ROW -->
<section class="py-24 bg-white border-t border-gray-100">
<div class="container mx-auto px-4 max-w-6xl">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

    <!-- FAQ -->
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Frequently Asked Questions</h2>
        <div class="space-y-4" x-data="{ selected: 1 }">

            <div class="border border-gray-200 hover:border-orange-300 rounded-2xl overflow-hidden transition-colors bg-gray-50/50">
                <button @click="selected !== 1 ? selected = 1 : selected = null" class="w-full text-left px-6 py-5 font-bold outline-none flex justify-between items-center text-gray-900">
                    How much does home care cost in {{ $demographic->city }}?
                    <svg class="w-5 h-5 text-orange-500 transition-transform duration-300" :class="selected === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="px-6 py-4 text-gray-600 border-t border-gray-100 leading-relaxed bg-white" x-show="selected === 1" x-collapse>
                    Home care averages ${{ number_format($demographic->avg_home_care_cost) }} monthly depending on hours and care level based on area specifics.
                </div>
            </div>

            <div class="border border-gray-200 hover:border-orange-300 rounded-2xl overflow-hidden transition-colors bg-gray-50/50">
                <button @click="selected !== 2 ? selected = 2 : selected = null" class="w-full text-left px-6 py-5 font-bold outline-none flex justify-between items-center text-gray-900">
                    What types of senior care are available in {{ $demographic->city }}?
                    <svg class="w-5 h-5 text-orange-500 transition-transform duration-300" :class="selected === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="px-6 py-4 text-gray-600 border-t border-gray-100 leading-relaxed bg-white" x-show="selected === 2" x-collapse style="display: none;">
                    Residents can choose from in-home care, assisted living, memory care, and nursing homes tailored to their unique needs.
                </div>
            </div>

        </div>
    </div>
    
    <!-- CTA RIGHT SIDE -->
    <div class="bg-orange-600 rounded-[2.5rem] p-12 text-center text-white flex flex-col justify-center relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20 -z-0 mix-blend-overlay"></div>
        <div class="relative z-10">
            <h3 class="text-3xl lg:text-4xl font-black mb-6 leading-tight">Find Trusted Senior Care Providers in {{ $demographic->city }}</h3>
            <p class="mb-10 text-xl text-orange-100 font-light">Compare licensed caregivers and connect with experts today.</p>
            <a href="{{ route('listings.index', ['country' => 'us', 'city' => strtolower(str_replace(' ', '-', $demographic->city))]) }}" class="inline-block bg-white text-orange-700 font-bold py-4 px-10 rounded-full text-lg shadow-xl hover:scale-105 transition-all duration-300">Start Your Search</a>
        </div>
    </div>

</div>
</div>
</section>
@endsection
