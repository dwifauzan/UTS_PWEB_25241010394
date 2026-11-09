@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    {{-- Sapaan --}}
    <h1 class="text-2xl font-bold text-gray-900">Halo, {{ $username }}</h1>
    <p class="mt-1 text-gray-600">Berikut ringkasan buku bacaanmu.</p>

    {{-- Kartu statistik --}}
    @php
        $cards = [
            ['label' => 'Total Buku', 'value' => $stats['total']],
            ['label' => 'Selesai Dibaca', 'value' => $stats['selesai']],
            ['label' => 'Sedang Dibaca', 'value' => $stats['sedang']],
            ['label' => 'Halaman Dibaca', 'value' => number_format($stats['halaman_dibaca'], 0, ',', '.')],
        ];
    @endphp

    <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach ($cards as $card)
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <p class="text-sm text-gray-500">{{ $card['label'] }}</p>
                <p class="mt-1 text-2xl font-bold text-gray-900">{{ $card['value'] }}</p>
            </div>
        @endforeach
    </div>

    {{-- Daftar buku yang sedang dibaca --}}
    <div class="mt-8 bg-white border border-gray-200 rounded-lg">
        <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
            <h2 class="font-semibold text-gray-900">Sedang Dibaca</h2>
            <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="text-sm text-blue-700 hover:underline">Lihat semua buku</a>
        </div>

        <ul class="divide-y divide-gray-200">
            @forelse ($sedangDibaca as $book)
                <li class="px-4 py-4">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                        <div>
                            <p class="font-medium text-gray-900">{{ $book['judul'] }}</p>
                            <p class="text-sm text-gray-500">{{ $book['penulis'] }}</p>
                        </div>
                        <p class="text-sm text-gray-600">Halaman {{ $book['halaman_dibaca'] }} dari {{ $book['halaman'] }} ({{ $book['progres'] }}%)</p>
                    </div>
                    <div class="mt-2 h-2 rounded bg-gray-200">
                        <div class="h-2 rounded bg-blue-600" style="width: {{ $book['progres'] }}%"></div>
                    </div>
                </li>
            @empty
                <li class="px-4 py-6 text-center text-sm text-gray-500">Belum ada buku yang sedang dibaca.</li>
            @endforelse
        </ul>
    </div>
@endsection
