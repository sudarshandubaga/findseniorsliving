@extends('admin.layouts.app')

@section('title', 'Posts')
@section('header', 'Blog Posts')

@section('content')
    <div class="flex flex-col lg:flex-row gap-6 mb-6 items-start lg:items-center justify-between">
        <!-- Filters -->
        <form method="GET" action="{{ route('admin.posts.index') }}" class="flex flex-wrap gap-3 items-center">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search posts..."
                class="bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary w-64">

            <select name="status"
                class="bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                <option value="">All Status</option>
                <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
            </select>

            <select name="category"
                class="bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit"
                class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2.5 rounded-xl text-sm font-semibold transition-colors">
                Filter
            </button>
        </form>

        <a href="{{ route('admin.posts.create') }}"
            class="bg-primary hover:bg-primary/90 text-white px-5 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 transition-colors shadow-lg shadow-primary/20 whitespace-nowrap">
            <i data-lucide="plus" class="w-4 h-4"></i>
            New Post
        </a>
    </div>

    <!-- Posts Table -->
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">Title
                        </th>
                        <th class="text-left px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">
                            Categories</th>
                        <th class="text-left px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">Tags
                        </th>
                        <th class="text-left px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">Status
                        </th>
                        <th class="text-left px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">Date
                        </th>
                        <th class="text-right px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($posts as $post)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($post->featured_image)
                                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt=""
                                            class="w-10 h-10 rounded-lg object-cover">
                                    @else
                                        <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                            <i data-lucide="image" class="w-4 h-4 text-gray-300"></i>
                                        </div>
                                    @endif
                                    <span class="font-semibold text-sm text-gray-800">{{ Str::limit($post->title, 40) }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1">
                                    @foreach($post->categories->take(2) as $cat)
                                        <span
                                            class="bg-gray-100 text-gray-600 text-[10px] px-2 py-0.5 rounded-lg">{{ $cat->name }}</span>
                                    @endforeach
                                    @if($post->categories->count() > 2)
                                        <span class="text-gray-400 text-[10px]">+{{ $post->categories->count() - 2 }}</span>
                                    @endif
                                    @if($post->categories->isEmpty())
                                        <span class="text-gray-300 text-xs">—</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1">
                                    @foreach($post->tags->take(3) as $tag)
                                        <span
                                            class="bg-primary/10 text-primary text-[10px] px-2 py-0.5 rounded-full">{{ $tag->name }}</span>
                                    @endforeach
                                    @if($post->tags->count() > 3)
                                        <span class="text-gray-400 text-[10px]">+{{ $post->tags->count() - 3 }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="text-[10px] font-bold uppercase tracking-widest px-2 py-1 rounded-full {{ $post->status === 'published' ? 'bg-green-50 text-green-600' : 'bg-yellow-50 text-yellow-600' }}">
                                    {{ $post->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-400 text-xs">{{ $post->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.posts.edit', $post) }}"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-blue-50 text-gray-400 hover:text-blue-500 transition-colors">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                        onsubmit="return confirm('Delete this post?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-red-50 text-gray-400 hover:text-red-500 transition-colors">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mb-4">
                                        <i data-lucide="file-text" class="w-8 h-8 text-gray-300"></i>
                                    </div>
                                    <p class="text-gray-400 text-sm mb-4">No posts found</p>
                                    <a href="{{ route('admin.posts.create') }}"
                                        class="bg-primary text-white px-4 py-2 rounded-xl text-sm font-bold">Create First
                                        Post</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($posts->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $posts->withQueryString()->links() }}
            </div>
        @endif
    </div>
@endsection