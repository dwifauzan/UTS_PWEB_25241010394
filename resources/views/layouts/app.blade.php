<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') | Rak Buku</title>

    {{-- Tailwind CSS via CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen flex flex-col bg-gray-100 text-gray-800">
    @unless (request()->routeIs('login'))
        <x-navbar :username="$username ?? request('username')" />
    @endunless

    <main class="flex-1 w-full max-w-5xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    @include('components.footer')
</body>
</html>
