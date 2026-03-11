@extends('web.layouts.app')

@section('content')
<section class="py-20 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        <!-- Back Button -->
        <a href="{{ route('city-demographics.index') }}" class="inline-flex items-center text-primary font-bold mb-8 hover:translate-x-1 transition-transform">
            <i data-lucide="chevron-left" class="mr-1 w-5 h-5"></i>
            Back to All Cities
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content: City Stats -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Hero Info -->
                <div class="bg-white rounded-[2rem] p-10 shadow-sm border border-gray-100">
                    <div class="flex flex-wrap items-center justify-between gap-6 mb-10">
                        <div>
                            <span class="text-primary font-black uppercase tracking-widest text-xs mb-3 block">City Statistics</span>
                            <h1 class="text-5xl font-black text-[#1a1a1a]">{{ $demographic->city }}</h1>
                        </div>
                        <div class="flex gap-4">
                            <div class="bg-primary/5 p-4 rounded-3xl text-center min-w-[120px]">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Population</p>
                                <p class="text-xl font-black text-primary">{{ number_format($demographic->population) }}</p>
                            </div>
                            <div class="bg-blue-50 p-4 rounded-3xl text-center min-w-[120px]">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Senior Population</p>
                                <p class="text-xl font-black text-blue-600">{{ number_format($demographic->senior_population) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="p-6 bg-gray-50 rounded-2xl">
                            <i data-lucide="pie-chart" class="w-8 h-8 text-primary mb-4"></i>
                            <h4 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-2">Percent 65+</h4>
                            <p class="text-2xl font-black text-[#1a1a1a]">{{ $demographic->percent_65_plus }}%</p>
                        </div>
                        <div class="p-6 bg-gray-50 rounded-2xl">
                            <i data-lucide="calendar" class="w-8 h-8 text-blue-500 mb-4"></i>
                            <h4 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-2">Median Age</h4>
                            <p class="text-2xl font-black text-[#1a1a1a]">{{ $demographic->median_age }}</p>
                        </div>
                        <div class="p-6 bg-gray-50 rounded-2xl">
                            <i data-lucide="badge-dollar-sign" class="w-8 h-8 text-green-500 mb-4"></i>
                            <h4 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-2">Median Income</h4>
                            <p class="text-2xl font-black text-[#1a1a1a]">${{ number_format($demographic->median_household_income) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Health & Care Facilities -->
                <div class="bg-white rounded-[2rem] p-10 shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-black text-[#1a1a1a] mb-8 flex items-center">
                        <i data-lucide="hospital" class="mr-3 text-primary"></i>
                        Healthcare & Facilities
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-gray-400 uppercase">Hospitals</p>
                            <p class="text-xl font-black text-[#1a1a1a]">{{ $demographic->local_hospitals_count }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-gray-400 uppercase">Nursing Homes</p>
                            <p class="text-xl font-black text-[#1a1a1a]">{{ $demographic->nursing_homes }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-gray-400 uppercase">Assisted Living</p>
                            <p class="text-xl font-black text-[#1a1a1a]">{{ $demographic->assisted_living_facilities }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-gray-400 uppercase">Memory Care</p>
                            <p class="text-xl font-black text-[#1a1a1a]">{{ $demographic->memory_care_facilities }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-gray-400 uppercase">Hospice Providers</p>
                            <p class="text-xl font-black text-[#1a1a1a]">{{ $demographic->hospice_providers }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-gray-400 uppercase">Home Care Agencies</p>
                            <p class="text-xl font-black text-[#1a1a1a]">{{ $demographic->home_care_agencies }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-gray-400 uppercase">Avg. Home Care Cost</p>
                            <p class="text-xl font-black text-[#1a1a1a]">${{ number_format($demographic->avg_home_care_cost) }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-gray-400 uppercase">Hospital Rating</p>
                            <p class="text-xl font-black text-[#1a1a1a]">{{ $demographic->hospital_quality_rating }}/5</p>
                        </div>
                    </div>
                </div>

                <!-- Legal & Planning -->
                <div class="bg-white rounded-[2rem] p-10 shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-black text-[#1a1a1a] mb-8 flex items-center">
                        <i data-lucide="gavel" class="mr-3 text-primary"></i>
                        Legal & Planning Resources
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="flex items-start gap-4">
                            <div class="bg-amber-50 p-3 rounded-xl">
                                <i data-lucide="scale" class="w-6 h-6 text-amber-600"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-400 uppercase mb-1">Elder Law Firms</h4>
                                <p class="text-2xl font-black">{{ $demographic->elder_law_firms_count }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="bg-purple-50 p-3 rounded-xl">
                                <i data-lucide="files" class="w-6 h-6 text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-400 uppercase mb-1">Estate Planning</h4>
                                <p class="text-2xl font-black">{{ $demographic->estate_planning_lawyers_count }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="bg-red-50 p-3 rounded-xl">
                                <i data-lucide="shield-alert" class="w-6 h-6 text-red-600"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-400 uppercase mb-1">Guardianship Cases</h4>
                                <p class="text-2xl font-black">{{ $demographic->guardianship_cases_per_year }}/yr</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar: Climate & Living -->
            <div class="space-y-8">
                <!-- Living Costs -->
                <div class="bg-[#1a1a1a] text-white rounded-[2rem] p-8 shadow-xl">
                    <h3 class="text-xl font-bold mb-6">Living & Costs</h3>
                    <div class="space-y-6">
                        <div class="p-4 bg-white/5 rounded-2xl border border-white/10">
                            <p class="text-xs font-bold text-gray-400 uppercase mb-2">Hourly Care Rates</p>
                            <div class="flex items-end gap-2">
                                <span class="text-3xl font-black">${{ $demographic->hourly_rate_low }}</span>
                                <span class="text-gray-400 mb-1">-</span>
                                <span class="text-3xl font-black">${{ $demographic->hourly_rate_high }}</span>
                            </div>
                            <p class="text-[10px] text-gray-500 mt-2 uppercase font-black">Average per hour</p>
                        </div>
                        <div class="p-4 bg-white/5 rounded-2xl border border-white/10">
                            <p class="text-xs font-bold text-gray-400 uppercase mb-1">Life Expectancy</p>
                            <p class="text-3xl font-black text-primary">{{ $demographic->life_expectancy }} <span class="text-sm">years</span></p>
                        </div>
                        <div class="p-4 bg-white/5 rounded-2xl border border-white/10">
                            <p class="text-xs font-bold text-gray-400 uppercase mb-1">Disability Rate</p>
                            <p class="text-3xl font-black">{{ $demographic->disability_rate }}%</p>
                        </div>
                    </div>
                </div>

                <!-- Climate & Environment -->
                <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold text-[#1a1a1a] mb-6 flex items-center">
                        <i data-lucide="sun" class="mr-3 text-primary"></i>
                        Climate & Living
                    </h3>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="bg-blue-50 p-2 rounded-lg">
                                    <i data-lucide="cloud-snow" class="w-4 h-4 text-blue-500"></i>
                                </div>
                                <span class="text-sm font-bold text-gray-500">Avg. Winter Temp</span>
                            </div>
                            <span class="font-black text-[#1a1a1a]">{{ $demographic->avg_winter_temp }}°F</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="bg-orange-50 p-2 rounded-lg">
                                    <i data-lucide="sun" class="w-4 h-4 text-orange-500"></i>
                                </div>
                                <span class="text-sm font-bold text-gray-500">Avg. Summer Temp</span>
                            </div>
                            <span class="font-black text-[#1a1a1a]">{{ $demographic->avg_summer_temp }}°F</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="bg-red-50 p-2 rounded-lg">
                                    <i data-lucide="activity" class="w-4 h-4 text-red-500"></i>
                                </div>
                                <span class="text-sm font-bold text-gray-500">Crime Rate</span>
                            </div>
                            <span class="font-black text-[#1a1a1a]">{{ $demographic->crime_rate }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>
@endpush
@endsection
