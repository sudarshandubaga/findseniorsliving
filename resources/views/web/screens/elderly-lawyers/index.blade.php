@extends('web.layouts.app')

@section('content')
    <!-- Hero / Breadcrumb Section -->
    <div class="bg-gray-900 py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="https://picsum.photos/seed/lawyers/1920/400" alt="Background" class="w-full h-full object-cover">
        </div>
        <div class="container relative z-10 text-white">
            <nav class="flex mb-6 text-sm font-medium opacity-70 underline-offset-4">
                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <span class="mx-3">/</span>
                <a href="{{ route('lawyers.index') }}" class="hover:underline">Elderly Lawyers</a>
                @if($state)
                    <span class="mx-3">/</span>
                    <a href="{{ route('lawyers.index', ['country' => 'usa', 'state' => $state]) }}"
                        class="hover:underline">{{ strtoupper($state) }}</a>
                @endif
                @if($city)
                    <span class="mx-3">/</span>
                    <span class="text-primary">{{ ucwords(str_replace('-', ' ', $city)) }}</span>
                @endif
            </nav>
            <h1 class="text-4xl md:text-6xl font-black tracking-tighter">
                @if($city)
                    Elderly Lawyers in {{ ucwords(str_replace('-', ' ', $city)) }}, {{ strtoupper($state) }}
                @elseif($state)
                    Elderly Lawyers in {{ strtoupper($state) }}
                @else
                    All Elderly Lawyers
                @endif
            </h1>
        </div>
    </div>

    <!-- Main Content -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">

            <div class="flex flex-col lg:flex-row gap-12">

                <!-- Sidebar / Filters -->
                <div class="lg:w-1/4">
                    <div class="sticky top-32 space-y-8">
                        <div>
                            <h4 class="text-xl font-bold mb-6 pb-2 border-b-2 border-primary/20 text-[#1a1a1a]">Refine Search</h4>
                            <div class="space-y-4">
                                <input type="text" placeholder="Lawyer or Firm Name..."
                                    class="w-full p-4 bg-gray-50 border border-gray-100 rounded-sm focus:ring-2 focus:ring-primary outline-none transition-all placeholder:text-[13px] placeholder:font-medium">

                                <select
                                    class="w-full p-4 bg-gray-50 border border-gray-100 rounded-sm focus:ring-2 focus:ring-primary outline-none transition-all text-gray-500 font-medium text-[13px]">
                                    <option>All Specializations</option>
                                    <option>Estate Planning</option>
                                    <option>Elder Law</option>
                                    <option>Probate</option>
                                    <option>Guardianship</option>
                                </select>

                                <button
                                    class="w-full bg-primary text-white py-4 font-bold uppercase tracking-widest hover:bg-opacity-90 shadow-lg transition-all text-sm">
                                    Search Lawyers
                                </button>
                            </div>
                        </div>

                        <!-- Trusted Badge -->
                        <div class="bg-gray-50 p-8 rounded-sm border border-gray-100">
                             <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                                <i data-lucide="shield-check" class="w-6 h-6 text-primary"></i>
                             </div>
                             <h5 class="text-lg font-bold text-[#1a1a1a] mb-2">Verified Experts</h5>
                             <p class="text-gray-500 text-sm leading-relaxed">
                                Our listed lawyers are verified for their expertise in elderly law and related legal matters.
                             </p>
                        </div>
                    </div>
                </div>

                <!-- Lawyers Grid -->
                <div class="lg:w-3/4">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-10 pb-6 border-b border-gray-100 gap-4">
                        <p class="text-gray-500 text-sm">Showing <span
                                class="text-primary font-bold">{{ $lawyers->firstItem() }}-{{ $lawyers->lastItem() }}</span>
                            of <span class="text-[#1a1a1a] font-bold">{{ $lawyers->total() }}</span> results</p>

                        <div class="flex items-center space-x-4">
                            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Sort By:</span>
                            <select class="bg-transparent font-bold text-xs focus:outline-none cursor-pointer text-[#1a1a1a] uppercase tracking-wider">
                                <option>Newest</option>
                                <option>Name (A-Z)</option>
                                <option>Most Reviews</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @forelse($lawyers as $lawyer)
                            <div
                                class="group bg-white border border-gray-100 rounded-sm overflow-hidden hover:shadow-2xl transition-all duration-500 flex flex-col">
                                <div class="px-8 pt-8 flex flex-col items-center">
                                    <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mb-6 group-hover:bg-primary transition-all duration-500 overflow-hidden relative">
                                        @if($lawyer->image)
                                            <img src="{{ $lawyer->image }}" alt="{{ $lawyer->name }}" class="w-full h-full object-cover">
                                        @else
                                            <i data-lucide="user" class="w-12 h-12 text-primary group-hover:text-white transition-colors duration-500"></i>
                                        @endif
                                    </div>
                                    <h3 class="text-2xl font-bold text-[#1a1a1a] mb-2 group-hover:text-primary transition-colors text-center font-black tracking-tight">
                                        {{ $lawyer->name }}
                                    </h3>
                                    <p class="text-primary font-bold text-[10px] uppercase tracking-[0.2em] mb-4">
                                        {{ $lawyer->company ?: 'Legal Professional' }}
                                    </p>
                                </div>

                                <div class="px-8 pb-8 flex flex-col flex-grow text-center">
                                    <div class="flex items-center justify-center text-gray-400 text-xs mb-6 space-x-2">
                                        <i data-lucide="map-pin" class="w-3.5 h-3.5 text-primary/60"></i>
                                        <span class="font-medium">{{ $lawyer->city }}, {{ $lawyer->state }}</span>
                                    </div>

                                    <p class="text-gray-500 text-[14px] leading-relaxed mb-8 line-clamp-3">
                                        {{ Str::limit(strip_tags($lawyer->description), 120) }}
                                    </p>

                                    <div class="mt-auto pt-6 border-t border-gray-50">
                                        <a href="{{ $lawyer->profile_url ?: '#' }}" target="_blank"
                                            class="inline-flex items-center space-x-2 text-primary font-black text-[10px] uppercase tracking-[0.2em] group/link hover:translate-x-1 transition-transform">
                                            <span>Full Profile</span>
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
                                <h3 class="text-2xl font-bold text-[#1a1a1a] mb-2">No Lawyers Found</h3>
                                <p class="text-gray-500">We couldn't find any lawyers matching your criteria in this location.</p>
                                <a href="{{ route('lawyers.index') }}"
                                    class="inline-block mt-8 text-primary font-bold border-b-2 border-primary pb-1 uppercase tracking-widest text-xs">Browse All
                                    Lawyers</a>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-16">
                        {{ $lawyers->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
