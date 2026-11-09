@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="min-h-[70vh] flex items-center justify-center">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
            <div class="text-center mb-8">
                <div class="mx-auto mb-4 w-14 h-14 rounded-2xl bg-indigo-600 text-white flex items-center justify-center text-2xl">
                    📚
                </div>
                <h1 class="text-2xl font-bold text-slate-900">Selamat Datang di Rak Buku</h1>
                <p class="mt-2 text-sm text-slate-500">Masukkan username untuk mulai mencatat bacaanmu.</p>
            </div>

            <form action="{{ route('dashboard') }}" method="GET" class="space-y-5">
                <div>
                    <label for="username" class="block text-sm font-medium text-slate-700 mb-1">Username</label>
                    <input type="text" id="username" name="username" required autofocus
                           placeholder="contoh: budi"
                           class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <button type="submit"
                        class="w-full py-2.5 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition-colors">
                    Masuk
                </button>
            </form>
        </div>
    </div>
@endsection
