@extends('admin.layouts.app')

@section('title', 'User Management')
@section('header', 'System Users')

@section('content')
    <div class="flex flex-col lg:flex-row gap-6 mb-8 items-start lg:items-center justify-between">
        <div class="flex items-center gap-4">
            <h2 class="text-2xl font-bold text-gray-800">User Accounts</h2>
            <span
                class="bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full">{{ $users->total() }}
                Total</span>
        </div>

        <a href="{{ route('admin.users.create') }}"
            class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-2xl text-sm font-bold flex items-center gap-2 transition-all shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-[0.98]">
            <i data-lucide="user-plus" class="w-4 h-4"></i>
            Add User Account
        </a>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-50">
                        <th class="text-left px-8 py-5 text-[10px] font-black uppercase tracking-widest text-gray-400">User
                            Identity</th>
                        <th class="text-left px-8 py-5 text-[10px] font-black uppercase tracking-widest text-gray-400">
                            System Role</th>
                        <th class="text-left px-8 py-5 text-[10px] font-black uppercase tracking-widest text-gray-400">
                            Contact Details</th>
                        <th class="text-left px-8 py-5 text-[10px] font-black uppercase tracking-widest text-gray-400">
                            Joined Date</th>
                        <th class="text-right px-8 py-5 text-[10px] font-black uppercase tracking-widest text-gray-400">
                            Manage</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($users as $u)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center overflow-hidden shrink-0">
                                        @if($u->avatar)
                                            <img src="{{ $u->avatar_url }}" alt="" class="w-full h-full object-cover">
                                        @else
                                            <i data-lucide="user" class="w-5 h-5 text-gray-300"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-bold text-sm text-gray-800 group-hover:text-primary transition-colors">
                                            {{ $u->name }}</p>
                                        <p class="text-xs text-gray-400 mt-0.5">{{ $u->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <span
                                    class="px-3 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest {{ $u->role === 'admin' ? 'bg-indigo-50 text-indigo-500' : 'bg-amber-50 text-amber-500' }}">
                                    {{ $u->role }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <p class="text-xs text-gray-600 font-medium">{{ $u->phone ?: 'Not provided' }}</p>
                            </td>
                            <td class="px-8 py-5">
                                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">
                                    {{ $u->created_at->format('M d, Y') }}</p>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.users.edit', $u) }}"
                                        class="w-9 h-9 flex items-center justify-center rounded-xl bg-gray-50 hover:bg-blue-100 text-gray-400 hover:text-blue-600 transition-all active:scale-95 group/btn">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>
                                    @if($u->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $u) }}" method="POST"
                                            onsubmit="return confirm('Delete this user account? This action is irreversible.')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="w-9 h-9 flex items-center justify-center rounded-xl bg-gray-50 hover:bg-red-100 text-gray-400 hover:text-red-600 transition-all active:scale-95 group/btn">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-20 h-20 bg-gray-50 rounded-3xl flex items-center justify-center mb-6">
                                        <i data-lucide="users" class="w-10 h-10 text-gray-200"></i>
                                    </div>
                                    <h4 class="text-lg font-bold text-gray-800 mb-2">No other users found</h4>
                                    <p class="text-gray-400 max-w-sm mx-auto mb-8">System needs staff members to manage the
                                        portal. Create manager accounts here.</p>
                                    <a href="{{ route('admin.users.create') }}"
                                        class="bg-primary hover:bg-primary/90 text-white px-8 py-3.5 rounded-2xl text-sm font-bold shadow-lg shadow-primary/20">
                                        Create First Account
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="px-8 py-5 border-t border-gray-50 bg-gray-50/20">
                {{ $users->links() }}
            </div>
        @endif
    </div>
@endsection