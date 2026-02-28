<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Finaleyas Financial Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css'])
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="min-h-screen bg-white">

    <x-web.topbar />
    <x-web.navbar />

    <main>
        @yield('content')
    </main>

    <x-web.footer />
    <script src="//unpkg.com/alpinejs" defer></script>

    @vite(['resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>

</html>