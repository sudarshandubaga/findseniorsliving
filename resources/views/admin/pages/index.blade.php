@extends('admin.layouts.app')

@section('title', 'Pages CMS')
@section('header', 'Pages CMS')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <p class="text-gray-400 text-sm">Manage your website pages content</p>
        <a href="{{ route('admin.pages.create') }}"
            class="bg-primary hover:bg-primary/90 text-white px-5 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 transition-colors shadow-lg shadow-primary/20">
            <i data-lucide="plus" class="w-4 h-4"></i>
            New Page
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">Title
                        </th>
                        <th class="text-left px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">Slug
                        </th>
                        <th class="text-left px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">Last
                            Updated</th>
                        <th class="text-right px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($pages as $page)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center">
                                        <i data-lucide="book-open" class="w-4 h-4 text-amber-500"></i>
                                    </div>
                                    <span class="font-semibold text-sm text-gray-800">{{ $page->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-400 text-sm">/{{ $page->slug }}</td>
                            <td class="px-6 py-4 text-gray-400 text-xs">{{ $page->updated_at->format('M d, Y h:i A') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.pages.edit', $page) }}"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-blue-50 text-gray-400 hover:text-blue-500 transition-colors">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST"
                                        onsubmit="return confirm('Delete this page?')">
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
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mb-4">
                                        <i data-lucide="book-open" class="w-8 h-8 text-gray-300"></i>
                                    </div>
                                    <p class="text-gray-400 text-sm mb-4">No pages yet</p>
                                    <a href="{{ route('admin.pages.create') }}"
                                        class="bg-primary text-white px-4 py-2 rounded-xl text-sm font-bold">Create First
                                        Page</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($pages->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $pages->links() }}
            </div>
        @endif
    </div>
@endsection