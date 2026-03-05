<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Find Seniors Living</title>
    @vite(['resources/css/app.css'])
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full">
        <!-- Logo/Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold text-[#1a1a1a] tracking-tight">Admin Portal</h1>
            <p class="text-gray-400 mt-2">Find Seniors Living Management</p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8">
            @if(session('success'))
                <div class="bg-green-50 text-green-600 p-4 rounded-xl text-sm mb-6 font-medium">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 text-red-600 p-4 rounded-xl text-sm mb-6 font-medium">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Email
                        Address</label>
                    <div class="relative">
                        <i data-lucide="mail"
                            class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full bg-gray-50 border border-gray-100 rounded-xl px-11 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            placeholder="admin@example.com">
                    </div>
                    @error('email') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Password</label>
                    <div class="relative">
                        <i data-lucide="lock"
                            class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                        <input type="password" name="password" required
                            class="w-full bg-gray-50 border border-gray-100 rounded-xl px-11 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            placeholder="••••••••">
                    </div>
                    @error('password') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Captcha -->
                <div x-data="captchaData()">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Verification
                        (Math)</label>
                    <div class="flex items-center gap-3">
                        <div class="bg-gray-100 px-4 py-3 rounded-xl text-sm font-bold text-gray-700 min-w-[80px] text-center"
                            x-text="question">
                            Loading...
                        </div>
                        <input type="number" name="captcha" required
                            class="flex-1 bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            placeholder="Answer?">
                        <button type="button" @click="refreshCaptcha()"
                            class="w-11 h-11 flex items-center justify-center bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                            <i data-lucide="rotate-cw" class="w-4 h-4 text-gray-400"></i>
                        </button>
                    </div>
                    @error('captcha') <p class="text-red-500 text-[10px] mt-1 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="remember"
                            class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary">
                        <span class="text-sm text-gray-500 group-hover:text-gray-700 transition-colors">Remember
                            me</span>
                    </label>
                    <a href="{{ route('admin.password.request') }}"
                        class="text-sm font-semibold text-primary hover:underline">Forgot?</a>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-primary/20 transition-all active:scale-[0.98]">
                    Login to Dashboard
                </button>
            </form>
        </div>

        <p class="text-center text-gray-400 text-xs mt-8">
            &copy; {{ date('Y') }} Find Seniors Living. All rights reserved.
        </p>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        lucide.createIcons();

        function captchaData() {
            return {
                question: '',
                init() {
                    this.refreshCaptcha();
                },
                refreshCaptcha() {
                    fetch('{{ route('admin.captcha') }}')
                        .then(res => res.json())
                        .then(data => {
                            this.question = data.question;
                        });
                }
            }
        }
    </script>
</body>

</html>