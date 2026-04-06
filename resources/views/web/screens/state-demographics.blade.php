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
<ol class="list-reset flex items-center text-gray-500">
<li><a href="/" class="text-orange-600 hover:text-orange-800 transition-colors flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg> Home</a></li>
<li><span class="mx-3 text-gray-300">/</span></li>
<li><a href="{{ route('country-demographics.index') }}" class="text-orange-600 hover:text-orange-800 transition-colors">United States</a></li>
<li><span class="mx-3 text-gray-300">/</span></li>
<li class="text-gray-800">{{ $state->name }}</li>
</ol>
</nav>
</div>
</section>

<!-- HERO -->
<section class="relative bg-gradient-to-br from-orange-50 to-[#ffedd5] py-20 text-center overflow-hidden">
<div class="absolute top-0 left-0 w-64 h-64 bg-orange-400 opacity-10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
<div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-500 opacity-10 rounded-full blur-3xl translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

<div class="container mx-auto px-4 max-w-5xl relative z-10">
<span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4 block">State Overview</span>
<h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 mb-6 leading-tight">Senior Care in <span class="text-orange-600">{{ $state->name }}</span></h1>
<p class="text-xl md:text-2xl text-gray-600 mb-10 max-w-3xl mx-auto leading-relaxed">Compare care options, understand costs, and find trusted providers across {{ $state->name }}.</p>
<a href="#state-cities" class="inline-flex items-center justify-center bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 px-10 rounded-full text-lg shadow-xl shadow-orange-600/30 hover:-translate-y-1 transition-all duration-300">
    View Major Cities
    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
</a>
</div>
</section>

<!-- STATE OVERVIEW -->
<section class="py-20 bg-white">
<div class="container mx-auto px-4 max-w-6xl">
<div class="text-center mb-12">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Senior Care Overview</h2>
    <p class="text-gray-600 text-lg max-w-2xl mx-auto">{{ $state->name }} has an average senior population of {{ number_format($stateStats->avg_percent_65_plus ?? 0, 1) }}% aged 65 and older across its tracked cities.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center mt-8">
<div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(249,115,22,0.1)] transition-all duration-300 group">
<div class="bg-orange-50 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
</div>
<p class="text-4xl font-black text-gray-900 mb-2">{{ number_format($stateStats->total_population ?? 0) }}</p>
<p class="text-gray-500 font-medium uppercase tracking-wider text-sm">Total Tracked Population</p>
</div>

<div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(249,115,22,0.1)] transition-all duration-300 group">
<div class="bg-orange-50 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
</div>
<p class="text-4xl font-black text-gray-900 mb-2">{{ number_format($stateStats->avg_percent_65_plus ?? 0, 1) }}%</p>
<p class="text-gray-500 font-medium uppercase tracking-wider text-sm">Population 65+</p>
</div>

<div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(249,115,22,0.1)] transition-all duration-300 group">
<div class="bg-orange-50 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
</div>
<p class="text-4xl font-black text-gray-900 mb-2">${{ number_format($stateStats->avg_home_care_cost ?? 0) }}</p>
<p class="text-gray-500 font-medium uppercase tracking-wider text-sm">Avg Home Care / Mo</p>
</div>
</div>
</div>
</section>

<!-- COST & PROGRAMS SECTION -->
<section class="py-20 bg-gray-50 border-y border-gray-100">
<div class="container mx-auto px-4 max-w-6xl">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

    <!-- LEFT: Costs -->
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Cost of Senior Care in {{ $state->name }}</h2>
        
        <div class="bg-gradient-to-br from-orange-600 to-orange-700 rounded-3xl p-8 shadow-xl text-white relative overflow-hidden">
            <div class="absolute right-0 top-0 opacity-10">
                <svg class="w-48 h-48 -mr-10 -mt-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg>
            </div>
            <div class="relative z-10 space-y-6">
                <div class="border-b border-orange-500/50 pb-4">
                    <p class="text-orange-100 text-sm uppercase tracking-wider mb-1">Average Home Care Cost</p>
                    <p class="text-3xl font-bold">${{ number_format($stateStats->avg_home_care_cost ?? 0) }}<span class="text-xl text-orange-200 font-normal"> / mo</span></p>
                </div>
                <div class="border-b border-orange-500/50 pb-4">
                    <p class="text-orange-100 text-sm uppercase tracking-wider mb-1">Average Hourly Rate</p>
                    <p class="text-3xl font-bold">${{ number_format($stateStats->avg_hourly_low ?? 0, 0) }} - ${{ number_format($stateStats->avg_hourly_high ?? 0, 0) }}<span class="text-xl text-orange-200 font-normal"> / hr</span></p>
                </div>
                <div>
                    <p class="text-orange-100 text-sm uppercase tracking-wider mb-1">Average Life Expectancy</p>
                    <p class="text-3xl font-bold">{{ number_format($stateStats->avg_life_expectancy ?? 0, 1) }}<span class="text-xl text-orange-200 font-normal"> years</span></p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- RIGHT: Programs -->
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-6">State Programs & Financial Assistance</h2>
        <p class="text-gray-600 text-lg mb-8">{{ $state->name }} offers various programs to help cover the cost of senior care.</p>

        <ul class="text-gray-700 space-y-4 check-list text-lg">
            <li>Medicaid Home & Community-Based Waivers</li>
            <li>State Supplemental Security Income (SSI)</li>
            <li>Area Agencies on Aging (AAA) Programs</li>
        </ul>
        
        <div class="mt-8 p-6 bg-orange-50 rounded-2xl border border-orange-100">
            <h4 class="font-bold text-orange-900 mb-2 flex items-center"><svg class="w-5 h-5 mr-2 text-orange-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg> Good to know</h4>
            <p class="text-sm text-orange-800">State programs vary heavily by exact county and eligibility. Speak with a specialized elder counselor or local AAA directory for your specific situation.</p>
        </div>
    </div>

</div>
</div>
</section>

<!-- MAJOR CITIES IN STATE -->
<section id="state-cities" class="py-24 bg-white">
<div class="container mx-auto px-4 max-w-6xl">
<div class="text-center mb-12">
    <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-2 block">Directory</span>
    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Major Cities in {{ $state->name }}</h2>
</div>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
@foreach($cities as $city)
<a href="{{ route('country-demographics.show', $city->id) }}" class="bg-gray-50 border border-gray-200 rounded-xl px-6 py-4 text-center font-bold text-gray-700 hover:bg-white hover:text-orange-600 hover:border-orange-200 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
    {{ $city->city }}
</a>
@endforeach
</div>

@if($cities->hasPages())
<div class="mt-12 flex justify-center">
    {{ $cities->links() }}
</div>
@endif
</div>
</section>

<!-- FAQ & CTA ROW -->
<section class="py-24 bg-gray-50 border-t border-gray-100">
<div class="container mx-auto px-4 max-w-6xl">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

    <!-- FAQ -->
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Frequently Asked Questions</h2>
        <div class="space-y-4" x-data="{ selected: 1 }">

            <div class="border border-gray-200 hover:border-orange-300 rounded-2xl overflow-hidden transition-colors bg-white">
                <button @click="selected !== 1 ? selected = 1 : selected = null" class="w-full text-left px-6 py-5 font-bold outline-none flex justify-between items-center text-gray-900">
                    How much does home care cost in {{ $state->name }}?
                    <svg class="w-5 h-5 text-orange-500 transition-transform duration-300" :class="selected === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="px-6 py-4 text-gray-600 border-t border-gray-100 leading-relaxed" x-show="selected === 1" x-collapse>
                    The average home care cost in {{ $state->name }} is ${{ number_format($stateStats->avg_home_care_cost ?? 0) }} depending on region and care level.
                </div>
            </div>

            <div class="border border-gray-200 hover:border-orange-300 rounded-2xl overflow-hidden transition-colors bg-white">
                <button @click="selected !== 2 ? selected = 2 : selected = null" class="w-full text-left px-6 py-5 font-bold outline-none flex justify-between items-center text-gray-900">
                    Does Medicaid cover senior care in {{ $state->name }}?
                    <svg class="w-5 h-5 text-orange-500 transition-transform duration-300" :class="selected === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="px-6 py-4 text-gray-600 border-t border-gray-100 leading-relaxed" x-show="selected === 2" x-collapse style="display: none;">
                    Coverage depends on eligibility and state-specific Medicaid waiver programs.
                </div>
            </div>

        </div>
    </div>
    
    <!-- CTA RIGHT SIDE -->
    <div class="bg-orange-600 rounded-[2.5rem] p-12 text-center text-white flex flex-col justify-center relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20 -z-0 mix-blend-overlay"></div>
        <div class="relative z-10">
            <h3 class="text-3xl lg:text-4xl font-black mb-6 leading-tight">Find Trusted Senior Care Providers in {{ $state->name }}</h3>
            <p class="mb-10 text-xl text-orange-100 font-light">Browse verified caregivers and agencies across {{ $state->name }}.</p>
            <a href="{{ route('listings.index') }}" class="inline-block bg-white text-orange-700 font-bold py-4 px-10 rounded-full text-lg shadow-xl hover:scale-105 transition-all duration-300">Start Your Search</a>
        </div>
    </div>

</div>
</div>
</section>
@endsection
