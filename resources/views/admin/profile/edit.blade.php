@extends('admin.layouts.app')

@section('title', 'My Profile')
@section('header', 'My Profile')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Profile Info -->
        <div class="lg:col-span-2 space-y-8">
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data"
                class="bg-white rounded-3xl border border-gray-100 p-8 shadow-sm">
                @csrf @method('PUT')

                <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <i data-lucide="user" class="w-5 h-5 text-primary"></i>
                    Personal Information
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Display
                            Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                            class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        @error('name') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Email
                            Address</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        @error('email') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Phone
                            Number</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            placeholder="+1 (555) 000-0000">
                        @error('phone') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Profile
                            Photo</label>
                        <input type="file" name="avatar" accept="image/*"
                            class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition-all">
                        @error('avatar') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="bg-primary hover:bg-primary/90 text-white font-bold px-8 py-3 rounded-xl shadow-lg shadow-primary/20 transition-all active:scale-[0.98]">
                        Update Profile Details
                    </button>
                </div>
            </form>
        </div>

        <!-- Role/Avatar Preview Sidebar -->
        <div class="space-y-6">
            <div class="bg-white rounded-3xl border border-gray-100 p-8 shadow-sm text-center">
                <div class="relative inline-block mb-4">
                    @if($user->avatar)
                        <img src="{{ $user->avatar_url }}" alt=""
                            class="w-24 h-24 rounded-3xl object-cover ring-4 ring-primary/10">
                    @else
                        <div
                            class="w-24 h-24 bg-gray-100 rounded-3xl flex items-center justify-center ring-4 ring-gray-50 mx-auto">
                            <i data-lucide="user" class="w-10 h-10 text-gray-300"></i>
                        </div>
                    @endif
                    <div class="absolute -bottom-2 -right-2 bg-white rounded-xl shadow-lg px-3 py-1 border border-gray-100">
                        <span class="text-[10px] font-black uppercase tracking-widest text-primary">{{ $user->role }}</span>
                    </div>
                </div>
                <h2 class="text-xl font-bold text-gray-800">{{ $user->name }}</h2>
                <p class="text-sm text-gray-400 font-medium">{{ $user->email }}</p>
                <div class="mt-6 pt-6 border-t border-gray-50">
                    <a href="{{ route('admin.password.change') }}"
                        class="flex items-center justify-center gap-2 text-sm font-bold text-gray-600 hover:text-primary transition-colors py-2 group">
                        <i data-lucide="key" class="w-4 h-4 group-hover:rotate-12 transition-transform"></i>
                        Change Password
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection