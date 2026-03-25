@extends('web.layouts.app')

@section('content')
    <!-- Hero / Breadcrumb Section -->
    <div class="bg-gray-900 py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="https://picsum.photos/seed/listings/1920/400" alt="Background" class="w-full h-full object-cover">
        </div>
        <div class="container relative z-10 text-white">
            <nav class="flex mb-6 text-sm font-medium opacity-70 underline-offset-4">
                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <span class="mx-3">/</span>
                <a href="{{ route('listings.index') }}" class="hover:underline">Listings</a>
                @if($state)
                    <span class="mx-3">/</span>
                    <a href="{{ route('listings.index', ['country' => 'usa', 'state' => $state]) }}"
                        class="hover:underline">{{ strtoupper($state) }}</a>
                @endif
                @if($city)
                    <span class="mx-3">/</span>
                    <span class="text-primary">{{ ucwords(str_replace('-', ' ', $city)) }}</span>
                @endif
            </nav>
            <h1 class="text-4xl md:text-6xl font-black tracking-tighter">
                @if($city)
                    Senior Care in {{ ucwords(str_replace('-', ' ', $city)) }}, {{ strtoupper($state) }}
                @elseif($state)
                    Senior Care in {{ strtoupper($state) }}
                @else
                    All Senior Care Listings
                @endif
            </h1>
        </div>
    </div>

    <!-- Main Content -->
    <section class="py-24 bg-white">
        <div class="container">

            <div class="flex flex-col lg:flex-row gap-12">

                <!-- Sidebar / Filters (Placeholder for now) -->
                <div class="lg:w-1/4">
                    <div class="sticky top-32 space-y-8">
                        <style>
                            .filter-check input:checked~.check-box {
                                background-color: var(--color-primary, #ff4e00);
                                border-color: var(--color-primary, #ff4e00);
                            }

                            .filter-check input:checked~.check-box svg {
                                opacity: 1;
                            }

                            .filter-check input:checked~.check-label {
                                color: var(--color-primary, #ff4e00);
                            }

                            .filter-scrollbar::-webkit-scrollbar {
                                width: 4px;
                            }

                            .filter-scrollbar::-webkit-scrollbar-track {
                                background: #f3f4f6;
                                border-radius: 10px;
                            }

                            .filter-scrollbar::-webkit-scrollbar-thumb {
                                background: #d1d5db;
                                border-radius: 10px;
                            }

                            .filter-scrollbar::-webkit-scrollbar-thumb:hover {
                                background: #9ca3af;
                            }
                        </style>
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                            <div class="flex items-center justify-between mb-6 pb-3 border-b-2 border-primary/20">
                                <h4 class="text-lg font-black text-[#1a1a1a] uppercase tracking-wider">Filters</h4>
                                @if(request()->hasAny(['search', 'location', 'services', 'amenities']))
                                    <a href="{{ url()->current() }}"
                                        class="text-xs font-bold text-primary hover:underline flex items-center gap-1">
                                        <i data-lucide="x-circle" class="w-3.5 h-3.5"></i> Clear All
                                    </a>
                                @endif
                            </div>
                            <form action="{{ url()->current() }}" method="GET" class="space-y-7">
                                @if(request('sort'))
                                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                                @endif

                                <!-- Search -->
                                <div>
                                    <h5
                                        class="text-[11px] font-black uppercase tracking-widest text-gray-400 mb-3 flex items-center gap-2">
                                        <i data-lucide="search" class="w-3.5 h-3.5"></i> Search
                                    </h5>
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Search by name..."
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all placeholder-gray-400 text-sm font-medium">
                                </div>

                                <!-- Location -->
                                <div>
                                    <h5
                                        class="text-[11px] font-black uppercase tracking-widest text-gray-400 mb-3 flex items-center gap-2">
                                        <i data-lucide="map-pin" class="w-3.5 h-3.5"></i> Location
                                    </h5>
                                    <input type="text" name="location" value="{{ request('location') }}"
                                        placeholder="City, State, or Zip Code"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all placeholder-gray-400 text-sm font-medium">
                                </div>

                                <!-- Care Type Filter -->
                                <div>
                                    <h5
                                        class="text-[11px] font-black uppercase tracking-widest text-gray-400 mb-3 flex items-center gap-2">
                                        <i data-lucide="heart" class="w-3.5 h-3.5"></i> Care Type
                                    </h5>
                                    <div class="flex flex-col gap-2.5 max-h-56 overflow-y-auto filter-scrollbar pr-1">
                                        @foreach($serviceTypes ?? [] as $st)
                                            <label class="filter-check cursor-pointer relative flex items-center group">
                                                <input type="checkbox" name="services[]" value="{{ $st->id }}" class="sr-only"
                                                    {{ in_array($st->id, (array) request('services', [])) ? 'checked' : '' }}>
                                                <div
                                                    class="check-box w-[18px] h-[18px] rounded border-2 border-gray-200 bg-white mr-3 flex items-center justify-center transition-all duration-200 group-hover:border-primary/50 shrink-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-3 h-3 text-white opacity-0 transition-opacity"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </div>
                                                <span
                                                    class="check-label text-sm font-semibold text-gray-500 group-hover:text-primary transition-colors leading-tight">{{ $st->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Service Type Filter (Amenities) -->
                                <div>
                                    <h5
                                        class="text-[11px] font-black uppercase tracking-widest text-gray-400 mb-3 flex items-center gap-2">
                                        <i data-lucide="list-checks" class="w-3.5 h-3.5"></i> Service Type
                                    </h5>
                                    <div class="flex flex-col gap-2.5 max-h-56 overflow-y-auto filter-scrollbar pr-1">
                                        @foreach($amenities ?? [] as $am)
                                            <label class="filter-check cursor-pointer relative flex items-center group">
                                                <input type="checkbox" name="amenities[]" value="{{ $am->id }}" class="sr-only"
                                                    {{ in_array($am->id, (array) request('amenities', [])) ? 'checked' : '' }}>
                                                <div
                                                    class="check-box w-[18px] h-[18px] rounded border-2 border-gray-200 bg-white mr-3 flex items-center justify-center transition-all duration-200 group-hover:border-primary/50 shrink-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-3 h-3 text-white opacity-0 transition-opacity"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </div>
                                                <span
                                                    class="check-label text-sm font-semibold text-gray-500 group-hover:text-primary transition-colors leading-tight">{{ $am->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <button type="submit"
                                    class="w-full bg-primary text-white py-3.5 px-6 font-black uppercase tracking-widest text-xs hover:bg-opacity-90 rounded-xl shadow-lg shadow-primary/20 transition-all hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                    <i data-lucide="filter" class="w-4 h-4"></i>
                                    Apply Filters
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Listings Grid -->
                <div class="lg:w-3/4">
                    <div class="flex justify-between items-center mb-10 pb-6 border-b border-gray-100">
                        <p class="text-gray-500">Showing <span
                                class="text-primary font-bold">{{ $listings->firstItem() }}-{{ $listings->lastItem() }}</span>
                            of <span class="text-[#1a1a1a] font-bold">{{ $listings->total() }}</span> results</p>

                        <div class="flex items-center space-x-4">
                            <span class="text-sm font-bold uppercase tracking-widest text-gray-400">Sort By:</span>
                            <select class="bg-transparent font-bold text-sm focus:outline-none cursor-pointer"
                                onchange="window.location.href=this.value">
                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'newest', 'page' => null]) }}" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'name_asc', 'page' => null]) }}" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'popular', 'page' => null]) }}" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @forelse($listings as $listing)
                            <div
                                class="group bg-white border border-gray-100 rounded-sm overflow-hidden hover:shadow-2xl transition-all duration-500 flex flex-col">
                                <div class="relative h-48 overflow-hidden bg-gray-200">
                                    <img src="{{ $listing->featured_image }}" alt="{{ $listing->name }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    <div
                                        class="absolute top-4 left-4 bg-primary text-white px-4 py-1.5 text-[10px] font-black uppercase tracking-widest rounded-sm">
                                        {{ $listing->type ?? 'Featured' }}
                                    </div>
                                </div>

                                <div class="p-8 flex flex-col flex-1">
                                    <h3
                                        class="text-2xl font-bold text-[#1a1a1a] mb-4 group-hover:text-primary transition-colors line-clamp-1">
                                        {{ $listing->name }}
                                    </h3>

                                    <p class="text-gray-500 mb-6 flex items-start flex-1">
                                        <i data-lucide="map-pin" class="w-4 h-4 mr-2 mt-1 text-primary shrink-0"></i>
                                        <span class="text-sm leading-relaxed">
                                            {{ $listing->address ? $listing->address . ', ' : '' }}
                                            {{ $listing->city }}, {{ $listing->state }} {{ $listing->zipcode }}
                                        </span>
                                    </p>

                                    <div class="flex items-center justify-between pt-6 border-t border-gray-50 mt-auto">
                                        <div class="flex items-center space-x-1 text-primary">
                                            @for($i = 0; $i < 5; $i++)
                                                <i data-lucide="star" class="w-3.5 h-3.5 fill-primary"></i>
                                            @endfor
                                        </div>

                                        <a href="{{ $listing->url }}" target="_blank"
                                            class="flex items-center space-x-2 text-primary font-black text-xs uppercase tracking-widest group-hover:translate-x-1 transition-transform">
                                            <span>Full Details</span>
                                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full py-20 text-center bg-gray-50 rounded-sm">
                                <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i data-lucide="search-x" class="w-10 h-10 text-gray-400"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-[#1a1a1a] mb-2">No Results Found</h3>
                                <p class="text-gray-500">We couldn't find any senior care listings matching your criteria.</p>
                                <a href="{{ route('listings.index') }}"
                                    class="inline-block mt-8 text-primary font-bold border-b-2 border-primary pb-1">Browse All
                                    Listings</a>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-16">
                        {{ $listings->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection