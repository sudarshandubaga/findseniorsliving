@extends('web.layouts.app')

@section('title', $post->meta_title ?: $post->title)

@push('meta')
    @if($post->meta_description)
        <meta name="description" content="{{ $post->meta_description }}">
    @endif
    @if($post->meta_keywords)
        <meta name="keywords" content="{{ $post->meta_keywords }}">
    @endif
@endpush

@section('content')
    <!-- Hero -->
    <section class="bg-gradient-to-br from-[#1a1a1a] to-[#2d2d2d] py-12">
        <div class="container">
            <div class="max-w-4xl mx-auto text-center">
                <div class="flex items-center justify-center gap-2 mb-4 flex-wrap">
                    @foreach($post->categories as $cat)
                        <span class="bg-primary/20 text-primary text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full">
                            {{ $cat->name }}
                        </span>
                    @endforeach
                </div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-4 leading-tight">{{ $post->title }}</h1>
                <div class="flex items-center justify-center gap-4 text-gray-400 text-sm">
                    <span class="flex items-center gap-1">
                        <i data-lucide="calendar" class="w-4 h-4"></i>
                        {{ $post->created_at->format('F d, Y') }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-12 bg-gray-50">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <article class="lg:col-span-2">
                    @if($post->featured_image)
                        <div class="mb-8 rounded-2xl overflow-hidden shadow-lg">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                class="w-full h-64 md:h-96 object-cover">
                        </div>
                    @endif

                    <div class="bg-white rounded-2xl border border-gray-100 p-8 md:p-10">
                        <div class="prose prose-lg max-w-none prose-headings:font-bold prose-headings:text-gray-800
                            prose-p:text-gray-600 prose-p:leading-relaxed prose-a:text-primary prose-img:rounded-xl
                            prose-strong:text-gray-800 prose-blockquote:border-primary">
                            {!! $post->content !!}
                        </div>
                    </div>

                    <!-- Tags -->
                    @if($post->tags->isNotEmpty())
                        <div class="mt-6 bg-white rounded-2xl border border-gray-100 p-6">
                            <div class="flex items-center gap-3 flex-wrap">
                                <span class="text-sm font-bold text-gray-800 flex items-center gap-1">
                                    <i data-lucide="tag" class="w-4 h-4 text-primary"></i>
                                    Tags:
                                </span>
                                @foreach($post->tags as $tag)
                                    <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1.5 rounded-full">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Related Posts -->
                    @if($relatedPosts->isNotEmpty())
                        <div class="mt-10">
                            <h3 class="text-xl font-bold text-gray-800 mb-6">Related Posts</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                @foreach($relatedPosts as $related)
                                    <a href="{{ route('blog.show', $related->slug) }}"
                                        class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all border border-gray-100">
                                        <div class="h-32 overflow-hidden">
                                            @if($related->featured_image)
                                                <img src="{{ asset('storage/' . $related->featured_image) }}" alt=""
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                            @else
                                                <div class="w-full h-full bg-gradient-to-br from-primary/10 to-primary/5 flex items-center justify-center">
                                                    <i data-lucide="file-text" class="w-8 h-8 text-primary/30"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="p-4">
                                            <h4 class="text-sm font-bold text-gray-800 group-hover:text-primary transition-colors line-clamp-2">
                                                {{ $related->title }}
                                            </h4>
                                            <p class="text-[10px] text-gray-400 mt-2">{{ $related->created_at->format('M d, Y') }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </article>

                <!-- Sidebar -->
                <aside class="space-y-6">
                    <div class="bg-white rounded-2xl border border-gray-100 p-6">
                        <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i data-lucide="clock" class="w-4 h-4 text-primary"></i>
                            Recent Posts
                        </h3>
                        <div class="space-y-4">
                            @foreach($recentPosts as $recent)
                                <a href="{{ route('blog.show', $recent->slug) }}" class="flex gap-3 group">
                                    <div class="w-14 h-14 bg-gray-100 rounded-xl overflow-hidden shrink-0">
                                        @if($recent->featured_image)
                                            <img src="{{ asset('storage/' . $recent->featured_image) }}" alt=""
                                                class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <i data-lucide="file-text" class="w-4 h-4 text-gray-300"></i>
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

                    <!-- Back to Blog -->
                    <a href="{{ route('blog.index') }}"
                        class="flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-5 py-3 rounded-xl text-sm font-bold transition-colors shadow-lg shadow-primary/20 justify-center">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        Back to Blog
                    </a>
                </aside>
            </div>
        </div>
    </section>
@endsection
