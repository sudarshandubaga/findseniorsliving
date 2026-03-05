@extends('admin.layouts.app')

@section('title', 'Add New Feature')
@section('header', 'Create Feature')

@section('content')
    <div class="max-w-3xl mx-auto">
        <form action="{{ route('admin.why-choose-features.store') }}" method="POST"
            class="bg-white rounded-3xl border border-gray-100 p-8 shadow-sm">
            @csrf

            <h3 class="text-xl font-extrabold text-[#1a1a1a] mb-8 flex items-center gap-2">
                <i data-lucide="plus-circle" class="w-6 h-6 text-primary"></i>
                Feature Details
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Feature
                        Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        placeholder="e.g. Personalized Care">
                    @error('title') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p> @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Short
                        Description</label>
                    <textarea name="description" rows="3" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        placeholder="Describe this feature briefly...">{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Icon -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Lucide Icon
                        Name</label>
                    <div class="relative">
                        <input type="text" name="icon" value="{{ old('icon', 'shield-check') }}" required
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            placeholder="e.g. user-heart">
                        <p class="text-[10px] text-gray-400 mt-1 italic">Use any icon from lucide.dev</p>
                    </div>
                    @error('icon') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p> @enderror
                </div>

                <!-- Sort Order -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Display
                        Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    @error('sort_order') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-10 flex gap-4">
                <button type="submit"
                    class="flex-1 bg-primary hover:bg-primary/90 text-white font-bold px-8 py-3.5 rounded-xl shadow-lg shadow-primary/20 transition-all active:scale-[0.98]">
                    Save Feature
                </button>
                <a href="{{ route('admin.why-choose-features.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold px-8 py-3.5 rounded-xl transition-all">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection