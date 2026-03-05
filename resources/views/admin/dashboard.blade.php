@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 mb-8">
        <div class="admin-card bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center">
                    <i data-lucide="file-text" class="w-6 h-6 text-blue-500"></i>
                </div>
                <span
                    class="text-[10px] font-bold uppercase tracking-widest text-blue-500 bg-blue-50 px-2 py-1 rounded-full">Blog</span>
            </div>
            <h3 class="text-3xl font-extrabold text-gray-800">{{ $postCount }}</h3>
            <p class="text-gray-400 text-sm mt-1">Total Posts</p>
        </div>

        <div class="admin-card bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center">
                    <i data-lucide="folder" class="w-6 h-6 text-emerald-500"></i>
                </div>
                <span
                    class="text-[10px] font-bold uppercase tracking-widest text-emerald-500 bg-emerald-50 px-2 py-1 rounded-full">Blog</span>
            </div>
            <h3 class="text-3xl font-extrabold text-gray-800">{{ $categoryCount }}</h3>
            <p class="text-gray-400 text-sm mt-1">Categories</p>
        </div>

        <div class="admin-card bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center">
                    <i data-lucide="tag" class="w-6 h-6 text-purple-500"></i>
                </div>
                <span
                    class="text-[10px] font-bold uppercase tracking-widest text-purple-500 bg-purple-50 px-2 py-1 rounded-full">Blog</span>
            </div>
            <h3 class="text-3xl font-extrabold text-gray-800">{{ $tagCount }}</h3>
            <p class="text-gray-400 text-sm mt-1">Tags</p>
        </div>

        <div class="admin-card bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center">
                    <i data-lucide="book-open" class="w-6 h-6 text-amber-500"></i>
                </div>
                <span
                    class="text-[10px] font-bold uppercase tracking-widest text-amber-500 bg-amber-50 px-2 py-1 rounded-full">CMS</span>
            </div>
            <h3 class="text-3xl font-extrabold text-gray-800">{{ $pageCount }}</h3>
            <p class="text-gray-400 text-sm mt-1">Pages</p>
        </div>

        <div class="admin-card bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-pink-50 rounded-xl flex items-center justify-center">
                    <i data-lucide="layout" class="w-6 h-6 text-pink-500"></i>
                </div>
                <span
                    class="text-[10px] font-bold uppercase tracking-widest text-pink-500 bg-pink-50 px-2 py-1 rounded-full">Home</span>
            </div>
            <h3 class="text-3xl font-extrabold text-gray-800">{{ $heroCount }}</h3>
            <p class="text-gray-400 text-sm mt-1">Hero Slides</p>
        </div>

        <div class="admin-card bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-cyan-50 rounded-xl flex items-center justify-center">
                    <i data-lucide="check-circle" class="w-6 h-6 text-cyan-500"></i>
                </div>
                <span
                    class="text-[10px] font-bold uppercase tracking-widest text-cyan-500 bg-cyan-50 px-2 py-1 rounded-full">Home</span>
            </div>
            <h3 class="text-3xl font-extrabold text-gray-800">{{ $featureCount }}</h3>
            <p class="text-gray-400 text-sm mt-1">Why Choose Us</p>
        </div>
    </div>

    <!-- Recent Posts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="font-bold text-gray-800">Recent Posts</h3>
                <a href="{{ route('admin.posts.index') }}"
                    class="text-primary text-xs font-bold uppercase tracking-wider hover:underline">View All</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($recentPosts as $post)
                    <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                        <div>
                            <p class="font-semibold text-sm text-gray-800">{{ $post->title }}</p>
                            <p class="text-xs text-gray-400 mt-1">
                                {{ $post->categories->pluck('name')->implode(', ') ?: 'Uncategorized' }} ·
                                {{ $post->created_at->diffForHumans() }}
                            </p>
                        </div>
                        <span
                            class="text-[10px] font-bold uppercase tracking-widest px-2 py-1 rounded-full {{ $post->status === 'published' ? 'bg-green-50 text-green-600' : 'bg-yellow-50 text-yellow-600' }}">
                            {{ $post->status }}
                        </span>
                    </div>
                @empty
                    <div class="px-6 py-8 text-center text-gray-400 text-sm">No posts yet. Create your first post!</div>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="font-bold text-gray-800">Pages CMS</h3>
                <a href="{{ route('admin.pages.index') }}"
                    class="text-primary text-xs font-bold uppercase tracking-wider hover:underline">Manage</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($pages as $page)
                    <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                        <div>
                            <p class="font-semibold text-sm text-gray-800">{{ $page->title }}</p>
                            <p class="text-xs text-gray-400 mt-1">Last updated {{ $page->updated_at->diffForHumans() }}</p>
                        </div>
                        <a href="{{ route('admin.pages.edit', $page) }}"
                            class="text-primary hover:underline text-xs font-bold">Edit</a>
                    </div>
                @empty
                    <div class="px-6 py-8 text-center text-gray-400 text-sm">No pages yet.</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection