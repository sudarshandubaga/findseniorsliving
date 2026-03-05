@extends('admin.layouts.app')

@section('title', 'Change Password')
@section('header', 'Security Settings')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-3xl border border-gray-100 p-8 shadow-sm">
            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <i data-lucide="shield-check" class="w-6 h-6 text-primary"></i>
                Change Login Password
            </h3>

            <p class="text-sm text-gray-400 mb-8 leading-relaxed">
                Choose a strong, unique password that you don't use for other accounts. We recommend at least 8 characters
                including symbols and numbers.
            </p>

            <form action="{{ route('admin.password.change.update') }}" method="POST" class="space-y-6">
                @csrf @method('PUT')

                <!-- Current Password -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Current
                        Password</label>
                    <div class="relative">
                        <i data-lucide="lock" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                        <input type="password" name="current_password" required
                            class="w-full bg-gray-50 border border-gray-100 rounded-xl px-11 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            placeholder="Current Account Password">
                    </div>
                    @error('current_password') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- New Password -->
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">New
                            Password</label>
                        <div class="relative">
                            <i data-lucide="key" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                            <input type="password" name="password" required
                                class="w-full bg-gray-50 border border-gray-100 rounded-xl px-11 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                placeholder="New Password">
                        </div>
                    </div>

                    <!-- Confirm New Password -->
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Confirm New
                            Password</label>
                        <div class="relative">
                            <i data-lucide="check-circle"
                                class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                            <input type="password" name="password_confirmation" required
                                class="w-full bg-gray-50 border border-gray-100 rounded-xl px-11 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                placeholder="Retype New Password">
                        </div>
                    </div>
                </div>
                @error('password') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p> @enderror

                <div class="flex items-center gap-4 pt-4">
                    <button type="submit"
                        class="bg-primary hover:bg-primary/90 text-white font-bold px-8 py-3.5 rounded-xl shadow-lg shadow-primary/20 transition-all active:scale-[0.98]">
                        Confirm Changes
                    </button>
                    <a href="{{ route('admin.profile.edit') }}"
                        class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold px-8 py-3.5 rounded-xl transition-all">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection