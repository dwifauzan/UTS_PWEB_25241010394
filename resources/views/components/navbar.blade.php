@props(['username' => null])

@php
    $links = [
        'dashboard' => 'Dashboard',
        'pengelolaan' => 'Pengelolaan',
        'profile' => 'Profile',
    ];
@endphp

<nav class="bg-white border-b border-gray-200">
    <div class="max-w-5xl mx-auto px-4">
        <div class="flex items-center justify-between h-14">
            <a href="{{ route('dashboard', ['username' => $username]) }}" class="font-bold text-lg text-blue-700">Rak Buku</a>

            {{-- Menu desktop --}}
            <div class="hidden md:flex items-center gap-6 h-full">
                @foreach ($links as $route => $label)
                    <a href="{{ route($route, ['username' => $username]) }}"
                       class="h-full flex items-center text-sm border-b-2 {{ request()->routeIs($route) ? 'border-blue-700 text-blue-700 font-semibold' : 'border-transparent text-gray-600 hover:text-gray-900' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            <div class="hidden md:flex items-center gap-3 text-sm">
                <span class="text-gray-600">Masuk sebagai <strong class="text-gray-900">{{ $username ?? 'Tamu' }}</strong></span>
                <a href="{{ route('login') }}" class="px-3 py-1.5 rounded border border-gray-300 text-gray-700 hover:bg-gray-50">Keluar</a>
            </div>

            {{-- Tombol menu mobile --}}
            <button type="button" class="md:hidden px-3 py-1.5 rounded border border-gray-300 text-sm"
                    onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"
                    aria-controls="mobile-menu">Menu</button>
        </div>

        {{-- Menu mobile --}}
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 py-2">
            @foreach ($links as $route => $label)
                <a href="{{ route($route, ['username' => $username]) }}"
                   class="block px-2 py-2 rounded text-sm {{ request()->routeIs($route) ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                    {{ $label }}
                </a>
            @endforeach
            <div class="mt-2 pt-2 border-t border-gray-200 px-2 flex justify-between text-sm">
                <span class="text-gray-600">Masuk sebagai <strong class="text-gray-900">{{ $username ?? 'Tamu' }}</strong></span>
                <a href="{{ route('login') }}" class="text-gray-700 underline">Keluar</a>
            </div>
        </div>
    </div>
</nav>
