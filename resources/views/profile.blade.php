@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="max-w-2xl bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
            <div class="shrink-0 w-20 h-20 rounded-full bg-blue-700 text-white flex items-center justify-center text-2xl font-bold">
                {{ $profile['inisial'] }}
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $username }}</h1>
                <p class="mt-1 text-gray-600">{{ $profile['bio'] }}</p>
            </div>
        </div>

        <div class="mt-6 pt-6 border-t border-gray-200">
            <h2 class="font-semibold text-gray-900">Target Baca {{ date('Y') }}</h2>
            <p class="mt-1 text-sm text-gray-600">{{ $profile['selesai'] }} dari {{ $profile['target'] }} buku selesai ({{ $profile['progres'] }}%)</p>
            <div class="mt-2 h-2 rounded bg-gray-200">
                <div class="h-2 rounded bg-blue-600" style="width: {{ $profile['progres'] }}%"></div>
            </div>
        </div>

        <div class="mt-6 pt-6 border-t border-gray-200">
            <h2 class="font-semibold text-gray-900">Genre Favorit</h2>
            <ul class="mt-2 flex flex-wrap gap-2">
                @foreach ($profile['genre_favorit'] as $genre)
                    <li class="px-3 py-1 rounded border border-gray-300 text-sm text-gray-700">{{ $genre }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
