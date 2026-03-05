@extends('admin.layouts.app')

@section('title', 'Categories')
@section('header', 'Blog Categories')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Create Category -->
        <div class="bg-white rounded-2xl border border-gray-100 p-6 h-fit">
            <h3 class="font-bold text-gray-800 mb-4">Add New Category</h3>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                            placeholder="Category name...">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- SEO Fields -->
                    <div x-data="{ seoOpen: false }">
                        <button type="button" @click="seoOpen = !seoOpen"
                            class="flex items-center gap-2 text-xs font-bold text-gray-500 uppercase tracking-widest hover:text-primary transition-colors">
                            <i data-lucide="search" class="w-3 h-3"></i>
                            SEO Meta Details
                            <i data-lucide="chevron-down" class="w-3 h-3 transition-transform"
                                :class="seoOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="seoOpen" x-transition class="mt-3 space-y-3">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Meta
                                    Title</label>
                                <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                                    placeholder="SEO title...">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Meta
                                    Description</label>
                                <textarea name="meta_description" rows="2"
                                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                                    placeholder="SEO description...">{{ old('meta_description') }}</textarea>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Meta
                                    Keywords</label>
                                <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}"
                                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                                    placeholder="keyword1, keyword2...">
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-primary hover:bg-primary/90 text-white px-4 py-2.5 rounded-xl text-sm font-bold transition-colors">
                        Add Category
                    </button>
                </div>
            </form>
        </div>

        <!-- Categories List -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h3 class="font-bold text-gray-800">All Categories</h3>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($categories as $category)
                    <div class="px-6 py-4 hover:bg-gray-50 transition-colors" x-data="{ editing: false }">

                        <!-- View Mode -->
                        <div x-show="!editing" class="flex items-center justify-between">
                            <div>
                                <p class="font-semibold text-sm text-gray-800">{{ $category->name }}</p>
                                <p class="text-xs text-gray-400 mt-0.5">{{ $category->posts_count }} post(s) · slug:
                                    {{ $category->slug }}</p>
                                @if($category->meta_title)
                                    <p class="text-[10px] text-emerald-500 mt-1">
                                        <i data-lucide="search" class="w-2.5 h-2.5 inline"></i> SEO configured
                                    </p>
                                @endif
                            </div>
                            <div class="flex items-center gap-2">
                                <button @click="editing = true"
                                    class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-blue-50 text-gray-400 hover:text-blue-500 transition-colors">
                                    <i data-lucide="pencil" class="w-4 h-4"></i>
                                </button>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                    onsubmit="return confirm('Delete this category?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-red-50 text-gray-400 hover:text-red-500 transition-colors">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Edit Mode -->
                        <form x-show="editing" action="{{ route('admin.categories.update', $category) }}" method="POST"
                            class="space-y-3">
                            @csrf @method('PUT')
                            <div class="flex items-center gap-3">
                                <input type="text" name="name" value="{{ $category->name }}"
                                    class="flex-1 bg-gray-50 border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <button type="submit"
                                    class="bg-primary text-white px-4 py-2 rounded-xl text-xs font-bold">Save</button>
                                <button type="button" @click="editing = false"
                                    class="bg-gray-100 text-gray-600 px-4 py-2 rounded-xl text-xs font-bold">Cancel</button>
                            </div>
                            <div class="grid grid-cols-1 gap-2">
                                <input type="text" name="meta_title" value="{{ $category->meta_title }}"
                                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                                    placeholder="Meta Title...">
                                <textarea name="meta_description" rows="2"
                                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                                    placeholder="Meta Description...">{{ $category->meta_description }}</textarea>
                                <input type="text" name="meta_keywords" value="{{ $category->meta_keywords }}"
                                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                                    placeholder="Meta Keywords...">
                            </div>
                        </form>
                    </div>
                @empty
                    <div class="px-6 py-12 text-center">
                        <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="folder" class="w-8 h-8 text-gray-300"></i>
                        </div>
                        <p class="text-gray-400 text-sm">No categories yet. Create your first one.</p>
                    </div>
                @endforelse
            </div>

            @if($categories->hasPages())
                <div class="px-6 py-4 border-t border-gray-100">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection