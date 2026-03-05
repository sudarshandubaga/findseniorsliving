@extends('admin.layouts.app')

@section('title', 'Edit Hero Slide')
@section('header', 'Update Slide')

@section('content')
    <div class="max-w-3xl mx-auto">
        <form action="{{ route('admin.hero-slides.update', $heroSlide) }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-3xl border border-gray-100 p-8 shadow-sm">
            @csrf @method('PUT')

            <h3 class="text-xl font-extrabold text-[#1a1a1a] mb-8 flex items-center gap-2">
                <i data-lucide="edit-3" class="w-6 h-6 text-primary"></i>
                Update Content
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Main
                        Headline</label>
                    <input type="text" name="title" value="{{ old('title', $heroSlide->title) }}" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    @error('title') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p> @enderror
                </div>

                <!-- Subtitle -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Subtitle /
                        Tagline</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', $heroSlide->subtitle) }}"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    @error('subtitle') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Preview -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Background
                        Image</label>
                    <div class="w-32 h-20 rounded-xl overflow-hidden shadow-sm mb-4">
                        <img src="{{ $heroSlide->image_url }}" alt="" class="w-full h-full object-cover">
                    </div>
                    <input type="file" name="image" accept="image/*"
                        class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition-all shadow-sm">
                    @error('image') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p> @enderror
                </div>

                <!-- Sort Order -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Display
                        Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $heroSlide->sort_order) }}" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    @error('sort_order') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-10 flex gap-4">
                <button type="submit"
                    class="flex-1 bg-primary hover:bg-primary/90 text-white font-bold px-8 py-3.5 rounded-xl shadow-lg shadow-primary/20 transition-all active:scale-[0.98]">
                    Sync Changes
                </button>
                <a href="{{ route('admin.hero-slides.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold px-8 py-3.5 rounded-xl transition-all">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection