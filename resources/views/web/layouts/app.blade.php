<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Finaleyas Financial Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css'])
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
</body>

</html>