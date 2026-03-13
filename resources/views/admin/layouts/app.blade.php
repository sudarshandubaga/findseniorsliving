<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — FindSeniorsLiving</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php $favicon = \App\Models\Setting::where('key', 'site_favicon')->value('value'); @endphp
    <link rel="icon" type="image/png" href="{{ $favicon ? asset('storage/' . $favicon) : asset('images/favicon.png') }}">
    @vite(['resources/css/app.css'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        .sidebar {
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
        }

        .sidebar-link {
            transition: all 0.2s ease;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: rgba(255, 78, 0, 0.15);
            color: #ff4e00;
        }

        .sidebar-link.active {
            border-right: 3px solid #ff4e00;
        }

        .admin-card {
            transition: all 0.3s ease;
        }

        .admin-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .editor-toolbar button {
            transition: all 0.15s ease;
        }

        .editor-toolbar button:hover {
            background: #f1f5f9;
        }

        .editor-toolbar button.active {
            background: #ff4e00;
            color: white;
        }

        .tox-tinymce {
            border: 1px solid #e5e7eb !important;
            border-radius: 0.75rem !important;
        }

        .tox .tox-toolbar__group {
            padding: 0 4px !important;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="flex min-h-screen" x-data="{ sidebarOpen: true }">

        <!-- Sidebar -->
        <!-- Sidebar Backdrop (mobile overlay) -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" 
            class="fixed inset-0 bg-black/50 z-20 lg:hidden" x-transition.opacity></div>

        <aside class="sidebar w-64 h-screen flex flex-col shrink-0 fixed z-30 top-0 left-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" style="transition: transform 0.3s ease;">
            <!-- Logo -->
            <div class="h-16 flex items-center px-6 border-b border-white/10 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <i data-lucide="shield" class="w-4 h-4 text-white"></i>
                    </div>
                    <span class="text-white font-bold text-sm tracking-wide">FSL Admin</span>
                </div>
            </div>

            <!-- Navigation (scrollable) -->
            <nav class="flex-1 py-6 px-3 space-y-1 overflow-y-auto">
                <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest px-3 mb-3">Main</p>
                <a href="{{ route('admin.dashboard') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-300 text-sm {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    Dashboard
                </a>

                <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest px-3 mb-3 mt-6">Blog</p>
                <a href="{{ route('admin.posts.index') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-300 text-sm {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                    <i data-lucide="file-text" class="w-4 h-4"></i>
                    Posts
                </a>
                <a href="{{ route('admin.categories.index') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-300 text-sm {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i data-lucide="folder" class="w-4 h-4"></i>
                    Categories
                </a>
                <a href="{{ route('admin.tags.index') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-300 text-sm {{ request()->routeIs('admin.tags.*') ? 'active' : '' }}">
                    <i data-lucide="tag" class="w-4 h-4"></i>
                    Tags
                </a>

                <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest px-3 mb-3 mt-6">Home Management
                </p>
                <a href="{{ route('admin.hero-slides.index') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-300 text-sm {{ request()->routeIs('admin.hero-slides.*') ? 'active' : '' }}">
                    <i data-lucide="image" class="w-4 h-4"></i>
                    Hero Slides
                </a>
                <a href="{{ route('admin.why-choose-features.index') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-300 text-sm {{ request()->routeIs('admin.why-choose-features.*') ? 'active' : '' }}">
                    <i data-lucide="check-square" class="w-4 h-4"></i>
                    Why Choose Us
                </a>

                <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest px-3 mb-3 mt-6">Content</p>
                <a href="{{ route('admin.pages.index') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-300 text-sm {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                    <i data-lucide="book-open" class="w-4 h-4"></i>
                    Pages CMS
                </a>

                <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest px-3 mb-3 mt-6">Account</p>
                <a href="{{ route('admin.profile.edit') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-300 text-sm {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                    <i data-lucide="user-cog" class="w-4 h-4"></i>
                    Edit Profile
                </a>
                <a href="{{ route('admin.password.change') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-300 text-sm {{ request()->routeIs('admin.password.change') ? 'active' : '' }}">
                    <i data-lucide="key-round" class="w-4 h-4"></i>
                    Change Password
                </a>

                @if(auth()->user()->isAdmin())
                <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest px-3 mb-3 mt-6">Settings</p>
                <a href="{{ route('admin.users.index') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-300 text-sm {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    User Accounts
                </a>
                <a href="{{ route('admin.settings.index') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-300 text-sm {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i data-lucide="settings-2" class="w-4 h-4"></i>
                    Site Settings
                </a>
                @endif

            </nav>

            <!-- User (pinned to bottom) -->
            <div class="p-4 border-t border-white/10">
                <a href="{{ route('admin.profile.edit') }}"
                    class="flex items-center gap-3 hover:bg-white/5 p-2 rounded-xl transition-colors">
                    <div class="w-8 h-8 rounded-xl overflow-hidden shrink-0">
                        @if(auth()->user()->avatar)
                        <img src="{{ auth()->user()->avatar_url }}" alt="" class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full bg-primary/20 flex items-center justify-center">
                            <i data-lucide="user" class="w-4 h-4 text-primary"></i>
                        </div>
                        @endif
                    </div>
                    <div>
                        <p class="text-white text-xs font-semibold">{{ auth()->user()->name }}</p>
                        <p class="text-gray-500 text-[10px] uppercase font-bold tracking-widest">
                            {{ auth()->user()->role }}
                        </p>
                    </div>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1" :class="sidebarOpen ? 'lg:ml-64' : 'ml-0'" style="transition: margin-left 0.3s ease;">
            <!-- Top Bar -->
            <header
                class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 sticky top-0 z-20">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="text-gray-400 hover:text-gray-600 transition-colors">
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>
                    <h1 class="text-lg font-bold text-gray-800">@yield('header', 'Dashboard')</h1>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('home') }}" target="_blank"
                        class="text-gray-400 hover:text-primary transition-colors flex items-center gap-2 text-sm font-semibold">
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                        View Site
                    </a>
                    <div class="h-4 w-px bg-gray-100 italic"></div>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="text-red-400 hover:text-red-500 transition-colors flex items-center gap-2 text-sm font-semibold bg-transparent border-0 p-0">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center gap-3"
                    x-data="{ show: true }" x-show="show" x-transition>
                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                    <span class="text-sm">{{ session('success') }}</span>
                    <button @click="show = false" class="ml-auto text-green-400 hover:text-green-600">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>
                @endif

                @if(session('error'))
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl flex items-center gap-3"
                    x-data="{ show: true }" x-show="show" x-transition>
                    <i data-lucide="alert-circle" class="w-5 h-5 text-red-500"></i>
                    <span class="text-sm">{{ session('error') }}</span>
                    <button @click="show = false" class="ml-auto text-red-400 hover:text-red-600">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/js/app.js'])
    <script
        src="https://cdn.tiny.cloud/1/{{ config('services.tinymce.api_key', 'no-api-key') }}/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>

</html>