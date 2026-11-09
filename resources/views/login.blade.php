@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="max-w-sm mx-auto mt-12 bg-white border border-gray-200 rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-900">Masuk ke Rak Buku</h1>
        <p class="mt-1 text-sm text-gray-600">Masukkan username untuk melihat daftar bacaanmu.</p>

        <form action="{{ route('dashboard') }}" method="GET" class="mt-6">
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" id="username" name="username" required autofocus
                   class="mt-1 w-full px-3 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-600 focus:ring-1 focus:ring-blue-600">

            <button type="submit" class="mt-4 w-full py-2 rounded bg-blue-700 text-white font-medium hover:bg-blue-800">
                Masuk
            </button>
        </form>
    </div>
@endsection
