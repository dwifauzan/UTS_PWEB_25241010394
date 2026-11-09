<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Ambil username dari query string (?username=...).
     * Jika kosong, gunakan "Tamu" sebagai nilai default.
     */
    private function getUsername(Request $request): string
    {
        $username = trim((string) $request->query('username', ''));

        return $username !== '' ? $username : 'Tamu';
    }

    public function login()
    {
        return view('login');
    }

    public function dashboard(Request $request)
    {
        $username = $this->getUsername($request);

        return view('dashboard', compact('username'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $this->getUsername($request);

        return view('pengelolaan', compact('username'));
    }

    public function profile(Request $request)
    {
        $username = $this->getUsername($request);

        return view('profile', compact('username'));
    }
}
