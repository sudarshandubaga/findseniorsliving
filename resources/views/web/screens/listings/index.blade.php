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
                    <a href="{{ route('listings.state', $state) }}" class="hover:underline">{{ strtoupper($state) }}</a>
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
                        <div>
                            <h4 class="text-xl font-bold mb-6 pb-2 border-b-2 border-primary/20">Refine Search</h4>
                            <div class="space-y-4">
                                <input type="text" placeholder="Search by name..."
                                    class="w-full p-4 bg-gray-50 border border-gray-100 rounded-sm focus:ring-2 focus:ring-primary outline-none transition-all">

                                <select
                                    class="w-full p-4 bg-gray-50 border border-gray-100 rounded-sm focus:ring-2 focus:ring-primary outline-none transition-all">
                                    <option>All Care Types</option>
                                    <option>Assisted Living</option>
                                    <option>Nursing Home</option>
                                    <option>Memory Care</option>
                                </select>

                                <button
                                    class="w-full bg-primary text-white py-4 font-bold uppercase tracking-widest hover:bg-opacity-90 shadow-lg transition-all">
                                    Apply Filters
                                </button>
                            </div>
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
                            <select class="bg-transparent font-bold text-sm focus:outline-none cursor-pointer">
                                <option>Newest</option>
                                <option>Name (A-Z)</option>
                                <option>Most Popular</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @forelse($listings as $listing)
                            <div
                                class="group bg-white border border-gray-100 rounded-sm overflow-hidden hover:shadow-2xl transition-all duration-500 flex flex-col">
                                <div class="relative h-48 overflow-hidden bg-gray-200">
                                    <img src="{{ $listing->image }}" alt="{{ $listing->name }}"
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

                                        <a href="#"
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