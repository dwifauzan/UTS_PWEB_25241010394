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

    /**
     * Data buku statis (belum memakai database).
     */
    private function getBooks(): array
    {
        return [
            [
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'genre' => 'Fiksi',
                'tahun' => 2005,
                'halaman' => 529,
                'halaman_dibaca' => 529,
                'status' => 'Selesai',
            ],
            [
                'judul' => 'Bumi Manusia',
                'penulis' => 'Pramoedya Ananta Toer',
                'genre' => 'Fiksi Sejarah',
                'tahun' => 1980,
                'halaman' => 535,
                'halaman_dibaca' => 312,
                'status' => 'Sedang Dibaca',
            ],
            [
                'judul' => 'Filosofi Teras',
                'penulis' => 'Henry Manampiring',
                'genre' => 'Pengembangan Diri',
                'tahun' => 2018,
                'halaman' => 346,
                'halaman_dibaca' => 346,
                'status' => 'Selesai',
            ],
            [
                'judul' => 'Atomic Habits',
                'penulis' => 'James Clear',
                'genre' => 'Pengembangan Diri',
                'tahun' => 2018,
                'halaman' => 320,
                'halaman_dibaca' => 145,
                'status' => 'Sedang Dibaca',
            ],
            [
                'judul' => 'Cantik Itu Luka',
                'penulis' => 'Eka Kurniawan',
                'genre' => 'Fiksi',
                'tahun' => 2002,
                'halaman' => 505,
                'halaman_dibaca' => 0,
                'status' => 'Belum Dibaca',
            ],
            [
                'judul' => 'Sapiens',
                'penulis' => 'Yuval Noah Harari',
                'genre' => 'Sejarah',
                'tahun' => 2011,
                'halaman' => 498,
                'halaman_dibaca' => 60,
                'status' => 'Sedang Dibaca',
            ],
            [
                'judul' => 'Clean Code',
                'penulis' => 'Robert C. Martin',
                'genre' => 'Teknologi',
                'tahun' => 2008,
                'halaman' => 464,
                'halaman_dibaca' => 0,
                'status' => 'Belum Dibaca',
            ],
            [
                'judul' => 'Negeri 5 Menara',
                'penulis' => 'Ahmad Fuadi',
                'genre' => 'Fiksi',
                'tahun' => 2009,
                'halaman' => 423,
                'halaman_dibaca' => 423,
                'status' => 'Selesai',
            ],
        ];
    }

    public function login()
    {
        return view('login');
    }

    public function dashboard(Request $request)
    {
        $username = $this->getUsername($request);
        $books = collect($this->getBooks());

        $stats = [
            'total' => $books->count(),
            'selesai' => $books->where('status', 'Selesai')->count(),
            'sedang' => $books->where('status', 'Sedang Dibaca')->count(),
            'halaman_dibaca' => $books->sum('halaman_dibaca'),
        ];

        // Buku yang sedang dibaca + persentase progresnya
        $sedangDibaca = $books
            ->where('status', 'Sedang Dibaca')
            ->map(function ($book) {
                $book['progres'] = (int) round($book['halaman_dibaca'] / $book['halaman'] * 100);

                return $book;
            })
            ->values();

        return view('dashboard', compact('username', 'stats', 'sedangDibaca'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $this->getUsername($request);
        $books = $this->getBooks();

        return view('pengelolaan', compact('username', 'books'));
    }

    public function profile(Request $request)
    {
        $username = $this->getUsername($request);
        $books = collect($this->getBooks());

        // Inisial avatar: huruf pertama tiap kata, maksimal 2 huruf
        $inisial = collect(explode(' ', $username))
            ->filter()
            ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
            ->take(2)
            ->implode('');

        $selesai = $books->where('status', 'Selesai')->count();
        $target = 12;

        $profile = [
            'inisial' => $inisial,
            'bio' => 'Pembaca santai yang suka novel Indonesia dan buku pengembangan diri. Satu bab sebelum tidur.',
            'target' => $target,
            'selesai' => $selesai,
            'progres' => (int) min(100, round($selesai / $target * 100)),
            'genre_favorit' => ['Fiksi', 'Fiksi Sejarah', 'Pengembangan Diri', 'Teknologi'],
        ];

        return view('profile', compact('username', 'profile'));
    }
}
