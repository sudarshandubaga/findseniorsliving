@extends('admin.layouts.app')

@section('title', 'Edit User Account')
@section('header', 'Update Account Info')

@section('content')
    <div class="max-w-3xl mx-auto">
        <form action="{{ route('admin.users.update', $user) }}" method="POST"
            class="bg-white rounded-3xl border border-gray-100 p-8 shadow-sm">
            @csrf @method('PUT')

            <h3 class="text-xl font-extrabold text-[#1a1a1a] mb-6 flex items-center gap-2">
                <i data-lucide="user-plus" class="w-6 h-6 text-primary"></i>
                Account Identification
            </h3>

            <!-- User Alert if editing self -->
            @if($user->id === auth()->id())
                <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-4 mb-8 flex items-start gap-3">
                    <i data-lucide="info" class="w-5 h-5 text-indigo-500 shrink-0 mt-0.5"></i>
                    <p class="text-xs text-indigo-700 leading-relaxed font-medium">
                        You are currently editing your own account. It's recommended to update your profile via the <a
                            href="{{ route('admin.profile.edit') }}" class="font-bold underline">Profile Settings</a> page
                        instead.
                    </p>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <!-- Name -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Display Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        placeholder="Full Name">
                    @error('name') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Email
                        Identity</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        placeholder="manager@example.com">
                    @error('email') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p> @enderror
                </div>

                <!-- Role -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">System Role</label>
                    <select name="role" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        <option value="manager" {{ old('role', $user->role) === 'manager' ? 'selected' : '' }}>Manager
                        </option>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Administrator
                        </option>
                    </select>
                </div>

                <!-- Phone -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Phone Number
                        (Optional)</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        placeholder="+1 (555) 000-0000">
                </div>

                <div class="md:col-span-2 mt-4 pt-6 border-t border-gray-50">
                    <h4 class="text-sm font-bold text-gray-800 mb-2">Change Password (Optional)</h4>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-6">Leave blank if you don't
                        want to change it</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Password -->
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">New
                                Secret Password</label>
                            <input type="password" name="password"
                                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                placeholder="••••••••">
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Confirm
                                New Password</label>
                            <input type="password" name="password_confirmation"
                                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                placeholder="••••••••">
                        </div>
                    </div>
                    @error('password') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-10 flex gap-4">
                <button type="submit"
                    class="flex-1 bg-primary hover:bg-primary/90 text-white font-bold px-8 py-3.5 rounded-xl shadow-lg shadow-primary/20 transition-all active:scale-[0.98]">
                    Sync Changes
                </button>
                <a href="{{ route('admin.users.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold px-8 py-3.5 rounded-xl transition-all">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection