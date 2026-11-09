@props(['username' => null])

@php
    $links = [
        'dashboard' => 'Dashboard',
        'pengelolaan' => 'Pengelolaan',
        'profile' => 'Profile',
    ];
@endphp

<nav class="bg-white border-b border-slate-200 sticky top-0 z-10">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <a href="{{ route('dashboard', ['username' => $username]) }}" class="text-lg font-bold text-indigo-600">
                Rak Buku
            </a>

            {{-- Menu desktop --}}
            <div class="hidden md:flex items-center gap-1">
                @foreach ($links as $route => $label)
                    <a href="{{ route($route, ['username' => $username]) }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium transition-colors
                              {{ request()->routeIs($route) ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            <div class="hidden md:flex items-center gap-3">
                <span class="text-sm text-slate-600">Hai, <span class="font-semibold text-slate-900">{{ $username ?? 'Tamu' }}</span></span>
                <a href="{{ route('login') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-red-600 hover:bg-red-50 transition-colors">Keluar</a>
            </div>

            {{-- Tombol menu mobile --}}
            <button type="button" class="md:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100"
                    onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"
                    aria-label="Buka menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        {{-- Menu mobile --}}
        <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-1">
            @foreach ($links as $route => $label)
                <a href="{{ route($route, ['username' => $username]) }}"
                   class="block px-3 py-2 rounded-lg text-sm font-medium
                          {{ request()->routeIs($route) ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-100' }}">
                    {{ $label }}
                </a>
            @endforeach
            <div class="border-t border-slate-200 pt-2 mt-2 flex items-center justify-between px-3">
                <span class="text-sm text-slate-600">Hai, <span class="font-semibold">{{ $username ?? 'Tamu' }}</span></span>
                <a href="{{ route('login') }}" class="text-sm font-medium text-red-600">Keluar</a>
            </div>
        </div>
    </div>
</nav>
