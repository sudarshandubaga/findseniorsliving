<section class="py-20 bg-gray-50/50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-[#1a1a1a] mb-4 tracking-tight">
                Our <span class="text-primary">Service Types</span>
            </h2>
            <div class="w-20 h-1.5 bg-primary mx-auto rounded-full"></div>
            <p class="mt-6 text-gray-500 max-w-2xl mx-auto text-lg leading-relaxed">
                Explore our comprehensive range of specialized senior care services tailored to provide comfort, safety,
                and a vibrant lifestyle for your loved ones.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($homecareTypes as $type)
                <div
                    class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 hover:-translate-y-2 flex flex-col items-center text-center">
                    <div
                        class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:-translate-y-1 transition-all duration-500">
                        @if($type->icon)
                            {!! $type->icon !!}
                        @else
                            <svg class="w-8 h-8 text-primary group-hover:text-white transition-colors duration-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold text-[#1a1a1a] mb-4">{{ $type->title }}</h3>

                    @if($type->short_description)
                        <p class="text-gray-500 text-sm leading-relaxed mb-4">
                            {{ $type->short_description }}
                        </p>
                    @endif

                    @if(count($type->children) > 0)
                        <ul class="text-left text-sm text-gray-600 space-y-2 mb-8 w-full px-2">
                            @foreach($type->children->take(10) as $child)
                                <li class="flex items-start group/item">
                                    <svg class="w-4 h-4 text-primary mr-2 flex-shrink-0 mt-0.5 group-hover/item:text-primary-dark transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                        </path>
                                    </svg>
                                    <a href="https://findcarez.com/types-of-in-home-care/{{ $child->slug }}" target="_blank"
                                        rel="noopener noreferrer"
                                        class="leading-snug hover:text-primary hover:underline transition-colors block w-full">
                                        {{ $child->title }}
                                    </a>
                                </li>
                            @endforeach
                            <!-- @if(count($type->children) > 5)
                                                <li class="text-xs text-primary font-medium italic mt-2">+ {{ count($type->children) - 5 }} more
                                                    options</li>
                                            @endif -->
                        </ul>
                    @else
                        <div class="mb-8"></div>
                    @endif

                    <!-- <a href="{{ route('listings.index', ['service' => $type->slug]) }}"
                                    class="mt-auto text-primary font-bold text-sm uppercase tracking-wider flex items-center group/link">
                                    Explore {{ explode(' ', $type->title)[0] }}
                                    <svg class="w-4 h-4 ml-1 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a> -->
                </div>
            @empty
                <div class="col-span-full py-10 text-center text-gray-500">
                    No service types found.
                </div>
            @endforelse
        </div>
    </div>
</section>