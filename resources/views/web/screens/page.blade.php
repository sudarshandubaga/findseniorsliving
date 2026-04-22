@extends('web.layouts.app')

@section('title', $page->meta_title ?: $page->title)

@push('meta')
    @if($page->meta_description)
        <meta name="description" content="{{ $page->meta_description }}">
    @endif
    @if($page->meta_keywords)
        <meta name="keywords" content="{{ $page->meta_keywords }}">
    @endif
    @if($page->canonical_url)
        <link rel="canonical" href="{{ $page->canonical_url }}">
    @endif
@endpush
@section('content')
<!-- Hero / Breadcrumb Section -->
<div class="bg-gray-900 py-32 relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="https://picsum.photos/seed/page-hero/1920/600" alt="Background" class="w-full h-full object-cover">
    </div>
    <div class="container relative z-10 text-white">
        <nav class="flex mb-8 text-sm font-medium opacity-70 underline-offset-4">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span class="mx-3">/</span>
            <span class="text-primary">{{ $page->title }}</span>
        </nav>
        <h1 class="text-5xl md:text-7xl font-black tracking-tighter max-w-4xl leading-tight">
            {{ $page->title }}
        </h1>
    </div>
</div>

<!-- Main Content -->
<section class="py-24 bg-white min-h-screen">
    <div class="container max-w-5xl">
        <div
            class="bg-white rounded-[2rem] p-10 md:p-20 shadow-2xl shadow-gray-200/50 border border-gray-100 -mt-32 relative z-20">
            <!-- Content Header -->
            <div class="flex items-center gap-4 mb-12 pb-8 border-b border-gray-50">
                <div class="bg-primary/10 p-4 rounded-2xl">
                    <i data-lucide="file-text" class="w-8 h-8 text-primary"></i>
                </div>
                <div>
                    <span
                        class="text-xs font-black uppercase tracking-[0.2em] text-primary/60 block mb-1">Information</span>
                    <h2 class="text-2xl font-bold text-[#1a1a1a]">Official Statement & Guidelines</h2>
                </div>
            </div>

            <!-- Page Content -->
            <div
                class="prose prose-xl prose-primary prose-headings:font-black prose-headings:tracking-tight prose-headings:text-[#1a1a1a] prose-p:text-gray-500 prose-p:leading-relaxed prose-li:text-gray-500 prose-strong:text-[#1a1a1a] max-w-none">
                {!! $page->content !!}
            </div>

            <!-- Footer Note -->
            <div
                class="mt-20 pt-12 border-t border-gray-100 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="flex items-center gap-4">
                    <div class="flex -space-x-3">
                        <img src="https://i.pravatar.cc/100?u=1"
                            class="w-12 h-12 rounded-full border-4 border-white shadow-sm" alt="Support">
                        <img src="https://i.pravatar.cc/100?u=2"
                            class="w-12 h-12 rounded-full border-4 border-white shadow-sm" alt="Support">
                    </div>
                    <p class="text-sm font-bold text-gray-500">Need help? <a href="{{ route('contact.show') }}"
                            class="text-primary hover:underline">Contact our support team</a></p>
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

<style>
    /* Custom prose overrides for even better typography */
    .prose h2 {
        font-size: 2.25rem;
        margin-top: 3rem;
        margin-bottom: 1.5rem;
    }

    .prose h3 {
        font-size: 1.75rem;
        margin-top: 2.5rem;
        margin-bottom: 1rem;
    }

    .prose p {
        margin-bottom: 1.5rem;
    }

    .prose ul {
        list-style-type: none;
        padding-left: 0;
    }

    .prose ul li {
        position: relative;
        padding-left: 2rem;
        margin-bottom: 0.75rem;
    }

    .prose ul li::before {
        content: '→';
        position: absolute;
        left: 0;
        color: var(--color-primary, #FB923C);
        font-weight: 900;
    }
</style>
@endsection