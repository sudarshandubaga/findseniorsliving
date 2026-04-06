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

<!-- HERO -->
<section class="relative bg-gradient-to-br from-orange-50 to-[#ffedd5] py-24 text-center overflow-hidden">
<div class="absolute top-0 left-0 w-64 h-64 bg-orange-400 opacity-10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
<div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-500 opacity-10 rounded-full blur-3xl translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

<div class="container mx-auto px-4 max-w-5xl relative z-10">
<span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4 block">National Overview</span>
<h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 mb-6 leading-tight">Senior Care in the <span class="text-orange-600">United States</span></h1>
<p class="text-xl md:text-2xl text-gray-600 mb-10 max-w-3xl mx-auto leading-relaxed">Explore care options, costs, and support programs available across the United States.</p>
<a href="#states" class="inline-flex items-center justify-center bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 px-10 rounded-full text-lg shadow-xl shadow-orange-600/30 hover:-translate-y-1 transition-all duration-300">
    Browse Major States
    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
</a>
</div>
</section>

<!-- AGING POPULATION -->
<section class="py-20 bg-white">
<div class="container mx-auto px-4 max-w-6xl">
<div class="text-center mb-12">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Aging Population Overview in <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded">United States</span></h2>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
<div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(249,115,22,0.1)] transition-all duration-300 group">
<div class="bg-orange-50 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
</div>
<p class="text-4xl font-black text-gray-900 mb-2">332M+</p>
<p class="text-gray-500 font-medium uppercase tracking-wider text-sm">Total Population</p>
</div>

<div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(249,115,22,0.1)] transition-all duration-300 group">
<div class="bg-orange-50 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
</div>
<p class="text-4xl font-black text-gray-900 mb-2">16.5%</p>
<p class="text-gray-500 font-medium uppercase tracking-wider text-sm">Population Aged 65+</p>
</div>

<div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(249,115,22,0.1)] transition-all duration-300 group">
<div class="bg-orange-50 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
</div>
<p class="text-4xl font-black text-gray-900 mb-2">78.7</p>
<p class="text-gray-500 font-medium uppercase tracking-wider text-sm">Life Expectancy</p>
</div>
</div>
<p class="mt-12 text-gray-700 text-lg leading-relaxed text-center max-w-3xl mx-auto">
United States is experiencing a rapid growth in its senior demographic, increasing demand for various levels of care.
</p>
</div>
</section>

<!-- CARE SYSTEM STRUCTURE & COST SECTION -->
<section class="py-20 bg-gray-50 border-y border-gray-100">
<div class="container mx-auto px-4 max-w-6xl">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
    
    <!-- LEFT: System -->
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-6">How Senior Care Works in United States</h2>
        <p class="text-gray-600 text-lg mb-8">Senior care involves a mix of private options, state programs, and federal assistance like Medicare and Medicaid.</p>

        <ul class="text-gray-700 space-y-4 check-list text-lg">
            <li>Public vs Private Care Options</li>
            <li>Availability of In-Home Care</li>
            <li>Assisted Living & Residential Facilities</li>
            <li>Licensing & Regulations</li>
        </ul>
    </div>

    <!-- RIGHT: Costs -->
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Cost of Senior Care in United States</h2>
        
        <div class="bg-gradient-to-br from-orange-600 to-orange-700 rounded-3xl p-8 shadow-xl text-white relative overflow-hidden">
            <div class="absolute right-0 top-0 opacity-10">
                <svg class="w-48 h-48 -mr-10 -mt-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg>
            </div>
            <div class="relative z-10 space-y-6">
                <div class="border-b border-orange-500/50 pb-4">
                    <p class="text-orange-100 text-sm uppercase tracking-wider mb-1">Average Home Care Cost</p>
                    <p class="text-3xl font-bold">$4,900<span class="text-xl text-orange-200 font-normal"> / mo</span></p>
                </div>
                <div class="border-b border-orange-500/50 pb-4">
                    <p class="text-orange-100 text-sm uppercase tracking-wider mb-1">Average Assisted Living Cost</p>
                    <p class="text-3xl font-bold">$4,500<span class="text-xl text-orange-200 font-normal"> / mo</span></p>
                </div>
                <div>
                    <p class="text-orange-100 text-sm uppercase tracking-wider mb-1">Average Nursing Home Cost</p>
                    <p class="text-3xl font-bold">$9,000<span class="text-xl text-orange-200 font-normal"> / mo</span></p>
                </div>
            </div>
        </div>
        <p class="mt-6 text-gray-500 italic text-sm text-center">
            * Costs vary depending on region, level of care required, and provider availability.
        </p>
    </div>

</div>
</div>
</section>

<!-- TYPES OF CARE -->
<section class="py-20 bg-white">
<div class="container mx-auto px-4 max-w-6xl">
<div class="text-center mb-16">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Types of Senior Care Available</h2>
    <p class="text-gray-600 text-lg max-w-2xl mx-auto">Explore the spectrum of specialized care designed to meet every stage of aging.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-10">
    <div class="bg-white border text-center border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:border-orange-200 rounded-3xl p-10 transition-all duration-300">
        <ul class="text-gray-700 space-y-5 text-xl font-medium text-left inline-block">
            <li class="flex items-center"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center mr-4"><div class="w-3 h-3 bg-orange-600 rounded-full"></div></div> In-Home Care</li>
            <li class="flex items-center"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center mr-4"><div class="w-3 h-3 bg-orange-600 rounded-full"></div></div> Dementia & Memory Care</li>
            <li class="flex items-center"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center mr-4"><div class="w-3 h-3 bg-orange-600 rounded-full"></div></div> Assisted Living</li>
            <li class="flex items-center"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center mr-4"><div class="w-3 h-3 bg-orange-600 rounded-full"></div></div> Nursing Homes</li>
        </ul>
    </div>
    <div class="bg-white border text-center border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:border-orange-200 rounded-3xl p-10 transition-all duration-300">
        <ul class="text-gray-700 space-y-5 text-xl font-medium text-left inline-block">
            <li class="flex items-center"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center mr-4"><div class="w-3 h-3 bg-orange-600 rounded-full"></div></div> Respite Care</li>
            <li class="flex items-center"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center mr-4"><div class="w-3 h-3 bg-orange-600 rounded-full"></div></div> Hospice & Palliative Care</li>
            <li class="flex items-center"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center mr-4"><div class="w-3 h-3 bg-orange-600 rounded-full"></div></div> Adult Day Care</li>
            <li class="flex items-center"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center mr-4"><div class="w-3 h-3 bg-orange-600 rounded-full"></div></div> Skilled Nursing Services</li>
        </ul>
    </div>
</div>
</div>
</section>

<!-- INFO STRIPS -->
<section class="py-16 bg-[#1e293b] text-white">
<div class="container mx-auto px-4 max-w-6xl">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left divide-y md:divide-y-0 md:divide-x divide-gray-700">
        
        <div class="md:pr-8">
            <h3 class="text-xl font-bold mb-4 flex items-center justify-center md:justify-start"><svg class="w-6 h-6 text-orange-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Government Programs</h3>
            <p class="text-gray-400 mb-4">Several financial assistance options exist to help cover care.</p>
            <ul class="text-sm space-y-2 text-gray-300">
                <li>• Medicare (short-term)</li>
                <li>• Medicaid (long-term care)</li>
                <li>• VA Aid & Attendance</li>
            </ul>
        </div>
        
        <div class="md:px-8 pt-8 md:pt-0">
            <h3 class="text-xl font-bold mb-4 flex items-center justify-center md:justify-start"><svg class="w-6 h-6 text-orange-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Regional Differences</h3>
            <p class="text-gray-400">Regulations, living costs, and the availability of specialized facilities can differ significantly from state to state.</p>
        </div>
        
        <div class="md:pl-8 pt-8 md:pt-0">
            <h3 class="text-xl font-bold mb-4 flex items-center justify-center md:justify-start"><svg class="w-6 h-6 text-orange-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg> Cultural Focus</h3>
            <p class="text-gray-400">Many providers offer culturally tailored programs, dietary options, and multi-lingual staff to meet diverse needs.</p>
        </div>
        
    </div>
</div>
</section>

<!-- MAJOR STATES -->
<section id="states" class="py-24 bg-gray-50">
<div class="container mx-auto px-4 max-w-6xl">
<div class="text-center mb-16">
    <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-2 block">Directory</span>
    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Senior Care By States</h2>
</div>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
@foreach($states as $state)
<a href="{{ route('country-demographics.state', $state->id) }}" class="bg-white border border-gray-200 rounded-xl px-6 py-4 text-center font-bold text-gray-700 hover:text-orange-600 hover:border-orange-200 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
    {{ $state->name }}
</a>
@endforeach
</div>
</div>
</section>

<!-- HOW TO FIND CARE & FAQ -->
<section class="py-24 bg-white border-t border-gray-100">
<div class="container mx-auto px-4 max-w-6xl">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

    <!-- HOW TO -->
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-8">How to Find Senior Care</h2>
        <div class="space-y-6">
            <div class="flex">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-orange-100 text-orange-600 font-bold flex items-center justify-center text-xl mr-5">1</div>
                <div>
                    <h4 class="text-xl font-bold text-gray-900 mb-1">Assess Needs</h4>
                    <p class="text-gray-600">Determine exactly what level of care your loved one requires.</p>
                </div>
            </div>
            <div class="flex">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-orange-100 text-orange-600 font-bold flex items-center justify-center text-xl mr-5">2</div>
                <div>
                    <h4 class="text-xl font-bold text-gray-900 mb-1">Compare Providers</h4>
                    <p class="text-gray-600">Filter licensed providers by cost, reviews, and specific services.</p>
                </div>
            </div>
            <div class="flex">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-orange-100 text-orange-600 font-bold flex items-center justify-center text-xl mr-5">3</div>
                <div>
                    <h4 class="text-xl font-bold text-gray-900 mb-1">Verify Eligibility & Review Contracts</h4>
                    <p class="text-gray-600">Check government program eligibility and review care contracts carefully, planning out long-term finances.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Frequently Asked Questions</h2>
        <div class="space-y-4" x-data="{ selected: 1 }">

            <div class="border border-gray-200 hover:border-orange-300 rounded-2xl overflow-hidden transition-colors">
                <button @click="selected !== 1 ? selected = 1 : selected = null" class="w-full text-left px-6 py-5 font-bold outline-none flex justify-between items-center text-gray-900 bg-gray-50/50">
                    How much does home care cost in United States?
                    <svg class="w-5 h-5 text-orange-500 transition-transform duration-300" :class="selected === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="px-6 py-4 text-gray-600 border-t border-gray-100 leading-relaxed" x-show="selected === 1" x-collapse>
                    The average cost is starting at $4,900 but varies heavily by region and specific care requirements.
                </div>
            </div>

            <div class="border border-gray-200 hover:border-orange-300 rounded-2xl overflow-hidden transition-colors">
                <button @click="selected !== 2 ? selected = 2 : selected = null" class="w-full text-left px-6 py-5 font-bold outline-none flex justify-between items-center text-gray-900 bg-gray-50/50">
                    Is senior care covered by public healthcare in United States?
                    <svg class="w-5 h-5 text-orange-500 transition-transform duration-300" :class="selected === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="px-6 py-4 text-gray-600 border-t border-gray-100 leading-relaxed" x-show="selected === 2" x-collapse style="display: none;">
                    Coverage depends on personal eligibility and national healthcare policies like Medicaid and Medicare.
                </div>
            </div>

        </div>
    </div>

</div>
</div>
</section>

<!-- CTA -->
<section class="py-20 relative">
<div class="absolute inset-0 bg-orange-600 -z-10"></div>
<div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20 -z-10 mix-blend-overlay"></div>
<div class="container mx-auto px-4 max-w-4xl">
<div class="text-center text-white">
<h3 class="text-4xl md:text-5xl font-extrabold mb-6">Find Trusted Senior Care Providers in the United States</h3>
<p class="mb-10 text-xl text-orange-100 font-light max-w-2xl mx-auto">Compare options, review costs, and connect with verified caregivers today.</p>
<a href="{{ route('listings.index') }}" class="inline-block bg-white text-orange-700 font-bold py-4 px-12 rounded-full text-lg shadow-[0_0_40px_rgb(255,255,255,0.3)] hover:scale-105 transition-all duration-300">Start Your Search Now</a>
</div>
</div>
</section>

@endsection
