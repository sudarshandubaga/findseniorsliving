@extends('admin.layouts.app')

@section('title', 'Edit Feature')
@section('header', 'Update Feature')

@section('content')
    <div class="max-w-3xl mx-auto">
        <form action="{{ route('admin.why-choose-features.update', $whyChooseFeature) }}" method="POST"
            class="bg-white rounded-3xl border border-gray-100 p-8 shadow-sm">
            @csrf @method('PUT')

            <h3 class="text-xl font-extrabold text-[#1a1a1a] mb-8 flex items-center gap-2">
                <i data-lucide="edit-3" class="w-6 h-6 text-primary"></i>
                Feature Details
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Feature
                        Title</label>
                    <input type="text" name="title" value="{{ old('title', $whyChooseFeature->title) }}" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    @error('title') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p> @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Short
                        Description</label>
                    <textarea name="description" rows="3" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">{{ old('description', $whyChooseFeature->description) }}</textarea>
                    @error('description') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Icon -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Lucide Icon
                        Name</label>
                    <div class="relative">
                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 bg-primary/10 rounded-xl flex items-center justify-center shrink-0">
                                <i data-lucide="{{ $whyChooseFeature->icon }}" class="w-5 h-5 text-primary"></i>
                            </div>
                            <input type="text" name="icon" value="{{ old('icon', $whyChooseFeature->icon) }}" required
                                class="flex-1 bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        </div>
                        <p class="text-[10px] text-gray-400 mt-1 italic">Use any icon from lucide.dev</p>
                    </div>
                    @error('icon') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p> @enderror
                </div>

                <!-- Sort Order -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Display
                        Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $whyChooseFeature->sort_order) }}"
                        required
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
                <a href="{{ route('admin.why-choose-features.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold px-8 py-3.5 rounded-xl transition-all">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection