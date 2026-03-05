@extends('web.layouts.app')

@section('content')
    <!-- Hero -->
    <section class="bg-gradient-to-br from-[#1a1a1a] to-[#2d2d2d] py-16">
        <div class="container text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Our Blog</h1>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">Expert insights, tips, and resources for senior care, elder law, and caregiving.</p>
            <div class="flex items-center justify-center gap-2 mt-6 text-sm">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-primary transition-colors">Home</a>
                <span class="text-gray-600">/</span>
                <span class="text-primary font-semibold">Blog</span>
            </div>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="py-16 bg-gray-50">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Posts -->
                <div class="lg:col-span-2">
                    @if($posts->isEmpty())
                        <div class="bg-white rounded-2xl p-12 text-center border border-gray-100">
                            <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <i data-lucide="file-text" class="w-10 h-10 text-gray-300"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">No posts yet</h3>
                            <p class="text-gray-400">Check back soon for new articles!</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($posts as $post)
                                <article class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100">
                                    <!-- Image -->
                                    <a href="{{ route('blog.show', $post->slug) }}" class="block relative h-48 overflow-hidden">
                                        @if($post->featured_image)
                                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-br from-primary/10 to-primary/5 flex items-center justify-center">
                                                <i data-lucide="file-text" class="w-12 h-12 text-primary/30"></i>
                                            </div>
                                        @endif
                                        @if($post->categories->isNotEmpty())
                                            <div class="absolute top-4 left-4 flex gap-1">
                                                @foreach($post->categories->take(2) as $cat)
                                                    <span class="bg-primary text-white text-[10px] font-bold uppercase tracking-widest px-2.5 py-1 rounded-full shadow-lg">
                                                        {{ $cat->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </a>

                                    <!-- Content -->
                                    <div class="p-6">
                                        <div class="flex items-center text-gray-400 text-xs mb-3 gap-3">
                                            <span class="flex items-center gap-1">
                                                <i data-lucide="calendar" class="w-3 h-3"></i>
                                                {{ $post->created_at->format('M d, Y') }}
                                            </span>
                                        </div>
                                        <h2 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-primary transition-colors line-clamp-2">
                                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                        </h2>
                                        <p class="text-gray-500 text-sm leading-relaxed line-clamp-3 mb-4">
                                            {{ Str::limit(strip_tags($post->content), 150) }}
                                        </p>

                                        @if($post->tags->isNotEmpty())
                                            <div class="flex flex-wrap gap-1 mb-4">
                                                @foreach($post->tags->take(3) as $tag)
                                                    <span class="bg-gray-100 text-gray-500 text-[10px] px-2 py-0.5 rounded-full">{{ $tag->name }}</span>
                                                @endforeach
                                            </div>
                                        @endif

                                        <a href="{{ route('blog.show', $post->slug) }}"
                                            class="text-primary text-sm font-bold uppercase tracking-wider hover:underline flex items-center gap-1">
                                            Read More
                                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        @if($posts->hasPages())
                            <div class="mt-8">
                                {{ $posts->links() }}
                            </div>
                        @endif
                    @endif
                </div>

                <!-- Sidebar -->
                <aside class="space-y-6">
                    <!-- Categories -->
                    <div class="bg-white rounded-2xl border border-gray-100 p-6">
                        <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i data-lucide="folder" class="w-4 h-4 text-primary"></i>
                            Categories
                        </h3>
                        <div class="space-y-2">
                            @foreach($categories as $category)
                                <div class="flex items-center justify-between py-1.5">
                                    <span class="text-sm text-gray-600 hover:text-primary transition-colors cursor-pointer">{{ $category->name }}</span>
                                    <span class="bg-gray-100 text-gray-400 text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $category->posts_count }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Recent Posts -->
                    <div class="bg-white rounded-2xl border border-gray-100 p-6">
                        <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i data-lucide="clock" class="w-4 h-4 text-primary"></i>
                            Recent Posts
                        </h3>
                        <div class="space-y-4">
                            @foreach($recentPosts as $recent)
                                <a href="{{ route('blog.show', $recent->slug) }}" class="flex gap-3 group">
                                    <div class="w-16 h-16 bg-gray-100 rounded-xl overflow-hidden shrink-0">
                                        @if($recent->featured_image)
                                            <img src="{{ asset('storage/' . $recent->featured_image) }}" alt=""
                                                class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <i data-lucide="file-text" class="w-5 h-5 text-gray-300"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-800 group-hover:text-primary transition-colors line-clamp-2">{{ $recent->title }}</h4>
                                        <p class="text-[10px] text-gray-400 mt-1">{{ $recent->created_at->format('M d, Y') }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Tags Cloud -->
                    <div class="bg-white rounded-2xl border border-gray-100 p-6">
                        <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i data-lucide="tag" class="w-4 h-4 text-primary"></i>
                            Popular Tags
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($tags as $tag)
                                <span class="bg-gray-100 hover:bg-primary/10 hover:text-primary text-gray-600 text-xs px-3 py-1.5 rounded-full transition-colors cursor-pointer">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
