@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    {{-- Sapaan --}}
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-slate-900">Halo, {{ $username }}! 👋</h1>
        <p class="mt-1 text-slate-500">Berikut ringkasan aktivitas membacamu.</p>
    </div>

    {{-- Kartu statistik --}}
    @php
        $cards = [
            ['label' => 'Total Buku', 'value' => $stats['total'], 'icon' => '📚', 'color' => 'bg-indigo-50 text-indigo-600'],
            ['label' => 'Selesai Dibaca', 'value' => $stats['selesai'], 'icon' => '✅', 'color' => 'bg-emerald-50 text-emerald-600'],
            ['label' => 'Sedang Dibaca', 'value' => $stats['sedang'], 'icon' => '📖', 'color' => 'bg-amber-50 text-amber-600'],
            ['label' => 'Halaman Dibaca', 'value' => number_format($stats['halaman_dibaca'], 0, ',', '.'), 'icon' => '📄', 'color' => 'bg-sky-50 text-sky-600'],
        ];
    @endphp

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
        @foreach ($cards as $card)
            <div class="bg-white rounded-2xl border border-slate-200 p-5">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center text-lg {{ $card['color'] }}">
                    {{ $card['icon'] }}
                </div>
                <p class="mt-4 text-2xl font-bold text-slate-900">{{ $card['value'] }}</p>
                <p class="text-sm text-slate-500">{{ $card['label'] }}</p>
            </div>
        @endforeach
    </div>

    {{-- Daftar buku yang sedang dibaca --}}
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold text-slate-900">Sedang Dibaca</h2>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700">
            Lihat semua →
        </a>
    </div>

    <div class="space-y-3">
        @forelse ($sedangDibaca as $book)
            <div class="bg-white rounded-2xl border border-slate-200 p-5">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                    <div>
                        <h3 class="font-semibold text-slate-900">{{ $book['judul'] }}</h3>
                        <p class="text-sm text-slate-500">{{ $book['penulis'] }} · {{ $book['genre'] }}</p>
                    </div>
                    <p class="text-sm text-slate-500">
                        Hal. {{ $book['halaman_dibaca'] }} / {{ $book['halaman'] }}
                    </p>
                </div>

                <div class="mt-4 flex items-center gap-3">
                    <div class="flex-1 h-2 rounded-full bg-slate-100 overflow-hidden">
                        <div class="h-full rounded-full bg-amber-500" style="width: {{ $book['progres'] }}%"></div>
                    </div>
                    <span class="text-sm font-medium text-slate-700 w-10 text-right">{{ $book['progres'] }}%</span>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-8 text-center text-slate-500">
                Belum ada buku yang sedang dibaca.
            </div>
        @endforelse
    </div>
@endsection
