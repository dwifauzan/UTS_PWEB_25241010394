@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
    <h1 class="text-2xl font-bold text-gray-900">Pengelolaan Buku</h1>
    <p class="mt-1 text-gray-600">Daftar semua buku ({{ count($books) }} buku).</p>

    <div class="mt-6 bg-white border border-gray-200 rounded-lg overflow-x-auto">
        <table class="w-full min-w-[640px] text-sm text-left">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-4 py-3 font-medium">Judul</th>
                    <th class="px-4 py-3 font-medium">Penulis</th>
                    <th class="px-4 py-3 font-medium">Genre</th>
                    <th class="px-4 py-3 font-medium">Tahun</th>
                    <th class="px-4 py-3 font-medium">Halaman</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($books as $book)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $book['judul'] }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $book['penulis'] }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $book['genre'] }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $book['tahun'] }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $book['halaman_dibaca'] }} / {{ $book['halaman'] }}</td>
                        <td class="px-4 py-3">
                            @if ($book['status'] === 'Selesai')
                                <span class="px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-800">{{ $book['status'] }}</span>
                            @elseif ($book['status'] === 'Sedang Dibaca')
                                <span class="px-2 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-800">{{ $book['status'] }}</span>
                            @else
                                <span class="px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-700">{{ $book['status'] }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
