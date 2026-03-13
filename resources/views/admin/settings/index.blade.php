@extends('admin.layouts.app')

@section('title', 'Site Settings')
@section('header', 'Site Settings')

@section('content')
    <div class="mb-6">
        <p class="text-gray-400 text-sm">Configure your website's branding and social presence</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- General Settings -->
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                        <i data-lucide="settings" class="w-5 h-5 text-primary"></i>
                        General Configuration
                    </h3>
                    
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-widest text-gray-400">Site Title</label>
                            <input type="text" name="site_title" value="{{ $settings['site_title'] ?? '' }}" 
                                class="w-full px-5 py-3.5 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-primary transition-all text-sm font-semibold"
                                placeholder="Enter site title">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-black uppercase tracking-widest text-gray-400">Site Email</label>
                                <input type="email" name="site_email" value="{{ $settings['site_email'] ?? '' }}" 
                                    class="w-full px-5 py-3.5 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-primary transition-all text-sm font-semibold">
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs font-black uppercase tracking-widest text-gray-400">Site Phone</label>
                                <input type="text" name="site_phone" value="{{ $settings['site_phone'] ?? '' }}" 
                                    class="w-full px-5 py-3.5 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-primary transition-all text-sm font-semibold">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-widest text-gray-400">Site Address</label>
                            <input type="text" name="site_address" value="{{ $settings['site_address'] ?? '' }}" 
                                class="w-full px-5 py-3.5 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-primary transition-all text-sm font-semibold">
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-widest text-gray-400">Site Logo</label>
                            <div class="flex items-start gap-6">
                                <div class="w-32 h-32 bg-gray-50 rounded-2xl border border-dashed border-gray-200 flex items-center justify-center overflow-hidden">
                                    @if(isset($settings['site_logo']))
                                        <img src="{{ asset('storage/' . $settings['site_logo']) }}" class="w-full h-full object-contain">
                                    @else
                                        <i data-lucide="image" class="w-8 h-8 text-gray-300"></i>
                                    @endif
                                </div>
                                <div class="flex-1 space-y-3">
                                    <input type="file" name="site_logo" id="logo_input" class="hidden">
                                    <label for="logo_input" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-600 px-4 py-2 rounded-xl text-sm font-bold cursor-pointer transition-colors">
                                        <i data-lucide="upload-cloud" class="w-4 h-4"></i>
                                        Upload New Logo
                                    </label>
                                    <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest leading-relaxed">Recommended size: 400x120px. PNG or SVG preferred.</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-widest text-gray-400">Favicon</label>
                            <div class="flex items-start gap-6">
                                <div class="w-20 h-20 bg-gray-50 rounded-2xl border border-dashed border-gray-200 flex items-center justify-center overflow-hidden">
                                    @if(isset($settings['site_favicon']))
                                        <img src="{{ asset('storage/' . $settings['site_favicon']) }}" class="w-full h-full object-contain">
                                    @else
                                        <i data-lucide="globe" class="w-6 h-6 text-gray-300"></i>
                                    @endif
                                </div>
                                <div class="flex-1 space-y-3">
                                    <input type="file" name="site_favicon" id="favicon_input" class="hidden">
                                    <label for="favicon_input" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-600 px-4 py-2 rounded-xl text-sm font-bold cursor-pointer transition-colors">
                                        <i data-lucide="upload-cloud" class="w-4 h-4"></i>
                                        Upload Favicon
                                    </label>
                                    <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest leading-relaxed">Recommended: 32x32 or 64x64px. ICO, PNG, or SVG.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                        <i data-lucide="share-2" class="w-5 h-5 text-primary"></i>
                        Social Media Links
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-widest text-gray-400">Facebook URL</label>
                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2">
                                    <i data-lucide="facebook" class="w-4 h-4 text-blue-600"></i>
                                </div>
                                <input type="url" name="social_facebook" value="{{ $settings['social_facebook'] ?? '' }}" 
                                    class="w-full pl-12 pr-5 py-3.5 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-primary transition-all text-sm font-semibold">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-widest text-gray-400">Twitter URL</label>
                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2">
                                    <i data-lucide="twitter" class="w-4 h-4 text-sky-500"></i>
                                </div>
                                <input type="url" name="social_twitter" value="{{ $settings['social_twitter'] ?? '' }}" 
                                    class="w-full pl-12 pr-5 py-3.5 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-primary transition-all text-sm font-semibold">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-widest text-gray-400">Instagram URL</label>
                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2">
                                    <i data-lucide="instagram" class="w-4 h-4 text-pink-600"></i>
                                </div>
                                <input type="url" name="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}" 
                                    class="w-full pl-12 pr-5 py-3.5 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-primary transition-all text-sm font-semibold">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-widest text-gray-400">LinkedIn URL</label>
                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2">
                                    <i data-lucide="linkedin" class="w-4 h-4 text-blue-700"></i>
                                </div>
                                <input type="url" name="social_linkedin" value="{{ $settings['social_linkedin'] ?? '' }}" 
                                    class="w-full pl-12 pr-5 py-3.5 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-primary transition-all text-sm font-semibold">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sticky Save Actions -->
            <div class="lg:col-span-1">
                <div class="bg-gray-900 rounded-2xl p-8 shadow-xl sticky top-32 text-white">
                    <h4 class="text-lg font-bold mb-4">Save Changes</h4>
                    <p class="text-gray-400 text-xs mb-8 leading-relaxed uppercase tracking-widest font-bold">Ensure all branding assets and social links are up to date before saving.</p>
                    
                    <button type="submit" 
                        class="w-full bg-primary hover:bg-primary/90 text-white py-4 rounded-xl font-black uppercase tracking-widest text-sm shadow-lg shadow-primary/20 transition-all hover:-translate-y-1 flex items-center justify-center gap-3">
                        <i data-lucide="save" class="w-4 h-4 text-white font-black"></i>
                        Update Settings
                    </button>
                    
                    <div class="mt-8 pt-8 border-t border-white/5 space-y-4">
                        <div class="flex items-center gap-3 text-xs font-bold text-gray-500">
                            <i data-lucide="clock" class="w-4 h-4"></i>
                            Built with standard SEO practices
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
