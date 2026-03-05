@php
    $latestPosts = \App\Models\Post::with('categories')
        ->where('status', 'published')
        ->latest()
        ->limit(3)
        ->get();
@endphp

@if($latestPosts->isNotEmpty())
    <section class="py-24 bg-white">
        <div class="container mx-auto">

            <!-- Header -->
            <div class="text-center mb-20">
                <h2 class="text-5xl font-bold text-[#1a1a1a] mb-6 tracking-tight">Latest from Our Blog</h2>
                <p class="text-gray-500 text-lg">Expert insights, tips, and resources for senior care, elder law, and
                    caregiving</p>
            </div>

            <!-- Blog Posts Grid -->
            <div class="grid md:grid-cols-3 gap-10">
                @foreach($latestPosts as $post)
                    <a href="{{ route('blog.show', $post->slug) }}" class="group">
                        <div class="overflow-hidden rounded-2xl mb-6 shadow-lg">
                            @if($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                    class="w-full aspect-[16/10] object-cover group-hover:scale-110 transition-transform duration-700" />
                            @else
                                <div
                                    class="w-full aspect-[16/10] bg-gradient-to-br from-primary/10 to-primary/5 flex items-center justify-center">
                                    <i data-lucide="file-text" class="w-12 h-12 text-primary/30"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex items-center gap-3 mb-3">
                            @foreach($post->categories->take(2) as $cat)
                                <span
                                    class="bg-primary/10 text-primary text-[10px] font-bold uppercase tracking-widest px-2.5 py-1 rounded-full">{{ $cat->name }}</span>
                            @endforeach
                            <span class="text-gray-400 text-xs">{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3
                            class="text-xl font-bold text-[#1a1a1a] mb-4 group-hover:text-primary transition-colors leading-tight line-clamp-2">
                            {{ $post->title }}
                        </h3>
                        <p class="text-gray-500 mb-6 leading-relaxed line-clamp-3">
                            {{ Str::limit(strip_tags($post->content), 120) }}
                        </p>
                        <span
                            class="text-primary font-black text-sm flex items-center group-hover:translate-x-2 transition-transform uppercase tracking-widest">
                            <span>Continue Reading</span>
                            <i data-lucide="arrow-right" class="ml-2 w-4 h-4"></i>
                        </span>
                    </a>
                @endforeach
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="{{ route('blog.index') }}"
                    class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-8 py-3.5 rounded-xl text-sm font-bold transition-all shadow-lg shadow-primary/20 hover:shadow-xl hover:shadow-primary/30">
                    View All Posts
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>

        </div>
    </section>
@endif