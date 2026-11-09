@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-slate-900">Pengelolaan Buku</h1>
        <p class="mt-1 text-slate-500">Daftar seluruh buku di rakmu ({{ count($books) }} buku).</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($books as $book)
            <div class="bg-white rounded-2xl border border-slate-200 p-5 flex flex-col">
                <div class="flex items-start justify-between gap-3">
                    <span class="text-xs font-medium text-slate-400">#{{ $loop->iteration }}</span>

                    @if ($book['status'] === 'Selesai')
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                            {{ $book['status'] }}
                        </span>
                    @elseif ($book['status'] === 'Sedang Dibaca')
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                            {{ $book['status'] }}
                        </span>
                    @else
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-600">
                            {{ $book['status'] }}
                        </span>
                    @endif
                </div>

                <h2 class="mt-3 text-lg font-semibold text-slate-900">{{ $book['judul'] }}</h2>
                <p class="text-sm text-slate-500">{{ $book['penulis'] }}</p>

                <dl class="mt-4 pt-4 border-t border-slate-100 grid grid-cols-3 gap-2 text-sm">
                    <div>
                        <dt class="text-slate-400">Genre</dt>
                        <dd class="font-medium text-slate-700">{{ $book['genre'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-slate-400">Tahun</dt>
                        <dd class="font-medium text-slate-700">{{ $book['tahun'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-slate-400">Halaman</dt>
                        <dd class="font-medium text-slate-700">{{ $book['halaman_dibaca'] }}/{{ $book['halaman'] }}</dd>
                    </div>
                </dl>
            </div>
        @endforeach
    </div>
@endsection
