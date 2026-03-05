<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Find Seniors Living</title>
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
            <h1 class="text-3xl font-extrabold text-[#1a1a1a] tracking-tight">Recover Account</h1>
            <p class="text-gray-400 mt-2">Find Seniors Living Management</p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8">
            @if(session('success'))
                <div class="bg-green-50 text-green-600 p-4 rounded-xl text-sm mb-6 font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.password.email') }}" method="POST" class="space-y-6">
                @csrf

                <p class="text-sm text-gray-500 leading-relaxed font-medium">
                    No worries! Enter your email below and we'll send you a link to reset your password.
                </p>

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

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-primary/20 transition-all active:scale-[0.98]">
                    Send Reset Link
                </button>

                <div class="text-center">
                    <a href="{{ route('admin.login') }}"
                        class="text-sm font-semibold text-gray-400 hover:text-primary transition-colors">
                        &larr; Back to Login
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>