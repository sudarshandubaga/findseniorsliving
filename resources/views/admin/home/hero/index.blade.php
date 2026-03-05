@extends('admin.layouts.app')

@section('title', 'Hero Slides Management')
@section('header', 'Hero Slides')

@section('content')
    <div class="flex flex-col lg:flex-row gap-6 mb-8 items-start lg:items-center justify-between">
        <div class="flex items-center gap-4">
            <h2 class="text-2xl font-bold text-gray-800">Hero Section Slides</h2>
            <span
                class="bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full">{{ $slides->count() }}
                Slides</span>
        </div>

        <a href="{{ route('admin.hero-slides.create') }}"
            class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-2xl text-sm font-bold flex items-center gap-2 transition-all shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-[0.98]">
            <i data-lucide="plus" class="w-4 h-4"></i>
            Add New Slide
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-50">
                        <th class="text-left px-8 py-5 text-[10px] font-black uppercase tracking-widest text-gray-400">
                            Preview</th>
                        <th class="text-left px-8 py-5 text-[10px] font-black uppercase tracking-widest text-gray-400">
                            Content</th>
                        <th class="text-left px-8 py-5 text-[10px] font-black uppercase tracking-widest text-gray-400">Order
                        </th>
                        <th class="text-right px-8 py-5 text-[10px] font-black uppercase tracking-widest text-gray-400">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($slides as $slide)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-8 py-5">
                                <div class="w-24 h-16 rounded-xl overflow-hidden shadow-sm">
                                    <img src="{{ $slide->image_url }}" alt="" class="w-full h-full object-cover">
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <p class="text-[10px] font-black uppercase tracking-widest text-primary mb-1">
                                    {{ $slide->subtitle }}</p>
                                <p class="font-bold text-sm text-gray-800 line-clamp-1">{{ $slide->title }}</p>
                            </td>
                            <td class="px-8 py-5">
                                <span
                                    class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold">{{ $slide->sort_order }}</span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.hero-slides.edit', $slide) }}"
                                        class="w-9 h-9 flex items-center justify-center rounded-xl bg-gray-50 hover:bg-blue-100 text-gray-400 hover:text-blue-600 transition-all active:scale-95 group/btn">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.hero-slides.destroy', $slide) }}" method="POST"
                                        onsubmit="return confirm('Delete this slide?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="w-9 h-9 flex items-center justify-center rounded-xl bg-gray-50 hover:bg-red-100 text-gray-400 hover:text-red-600 transition-all active:scale-95 group/btn">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-16 text-center text-gray-400">No slides found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection