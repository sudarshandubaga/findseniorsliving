@extends('web.layouts.app')

@section('content')
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-[#1a1a1a] mb-6">City Demographics</h1>
            <p class="text-lg text-gray-600">Explore comprehensive statistics and demographics for senior care across various cities.</p>
        </div>

        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto mb-12">
            <form action="{{ route('city-demographics.index') }}" method="GET" class="relative">
                <input type="text" name="search" value="{{ request('search') }}" 
                    placeholder="Search by city name..." 
                    class="w-full px-6 py-4 rounded-2xl border-none shadow-lg focus:ring-2 focus:ring-primary text-gray-700 text-lg transition-all pl-14">
                <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                    <i data-lucide="search" class="w-6 h-6"></i>
                </div>
                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 bg-primary text-white px-6 py-2 rounded-xl font-bold hover:bg-primary-dark transition-colors shadow-md">
                    Search
                </button>
            </form>
        </div>

        <!-- Demographics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($demographics as $city)
                <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group border border-gray-100">
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h3 class="text-2xl font-bold text-[#1a1a1a] mb-1 group-hover:text-primary transition-colors">
                                    {{ $city->city }}
                                </h3>
                                <p class="text-gray-500 font-medium tracking-wide uppercase text-xs">Population: {{ number_format($city->population) }}</p>
                            </div>
                            <div class="bg-primary/10 p-3 rounded-2xl">
                                <i data-lucide="map-pin" class="w-6 h-6 text-primary"></i>
                            </div>
                        </div>

                        <div class="space-y-4 mb-8">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Senior Population</span>
                                <span class="font-bold text-[#1a1a1a]">{{ number_format($city->senior_population) }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Percent 65+</span>
                                <span class="font-bold text-[#1a1a1a]">{{ $city->percent_65_plus }}%</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Median Age</span>
                                <span class="font-bold text-[#1a1a1a]">{{ $city->median_age }} years</span>
                            </div>
                        </div>

                        <a href="{{ route('city-demographics.show', $city->id) }}" 
                            class="flex items-center justify-center w-full py-4 rounded-2xl bg-gray-50 text-[#1a1a1a] font-bold text-sm hover:bg-primary hover:text-white transition-all group-hover:shadow-lg">
                            View Detailed Stats
                            <i data-lucide="arrow-right" class="ml-2 w-4 h-4"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <div class="bg-gray-100 inline-block p-6 rounded-full mb-6 text-gray-400">
                        <i data-lucide="database-zap" class="w-12 h-12"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#1a1a1a]">No cities found</h3>
                    <p class="text-gray-500">Try adjusting your search criteria.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-16 flex justify-center">
            {{ $demographics->links() }}
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Initialize Lucide icons if not already initialized
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>
@endpush
@endsection
