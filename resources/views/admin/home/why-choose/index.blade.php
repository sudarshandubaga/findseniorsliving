@extends('admin.layouts.app')

@section('title', 'Why Choose Us Management')
@section('header', 'Why Choose Us')

@section('content')
    <div class="flex flex-col lg:flex-row gap-6 mb-8 items-start lg:items-center justify-between">
        <div class="flex items-center gap-4">
            <h2 class="text-2xl font-bold text-gray-800">Key Features</h2>
            <span
                class="bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full">{{ $features->count() }}
                Features</span>
        </div>

        <a href="{{ route('admin.why-choose-features.create') }}"
            class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-2xl text-sm font-bold flex items-center gap-2 transition-all shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-[0.98]">
            <i data-lucide="plus" class="w-4 h-4"></i>
            Add New Feature
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-50">
                        <th class="text-left px-8 py-5 text-[10px] font-black uppercase tracking-widest text-gray-400">Icon
                        </th>
                        <th class="text-left px-8 py-5 text-[10px] font-black uppercase tracking-widest text-gray-400">
                            Feature Details</th>
                        <th class="text-left px-8 py-5 text-[10px] font-black uppercase tracking-widest text-gray-400">Order
                        </th>
                        <th class="text-right px-8 py-5 text-[10px] font-black uppercase tracking-widest text-gray-400">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($features as $f)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-8 py-5">
                                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center">
                                    <i data-lucide="{{ $f->icon }}" class="w-5 h-5 text-primary"></i>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <p class="font-bold text-sm text-gray-800 mb-1 line-clamp-1">{{ $f->title }}</p>
                                <p class="text-xs text-gray-400 line-clamp-1">{{ $f->description }}</p>
                            </td>
                            <td class="px-8 py-5">
                                <span
                                    class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold">{{ $f->sort_order }}</span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.why-choose-features.edit', $f) }}"
                                        class="w-9 h-9 flex items-center justify-center rounded-xl bg-gray-50 hover:bg-blue-100 text-gray-400 hover:text-blue-600 transition-all active:scale-95 group/btn">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.why-choose-features.destroy', $f) }}" method="POST"
                                        onsubmit="return confirm('Delete this feature?')">
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
                            <td colspan="4" class="px-8 py-16 text-center text-gray-400">No features found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection