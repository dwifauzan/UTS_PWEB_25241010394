# Rak Buku

Aplikasi web sederhana untuk mencatat dan memantau buku bacaan pribadi. Dibuat dengan **Laravel** dan **Blade Templating**, tampilan memakai **Tailwind CSS** (CDN). Data buku masih berupa array statis di controller (tanpa database).

## Fitur

- **Login sederhana**: memasukkan username, lalu username dibawa ke setiap halaman lewat query string `?username=`.
- **Dashboard**: sapaan username, 4 kartu statistik (total buku, selesai, sedang dibaca, halaman dibaca), dan daftar buku yang sedang dibaca beserta progresnya.
- **Pengelolaan**: daftar seluruh buku dengan badge status berwarna (Selesai, Sedang Dibaca, Belum Dibaca).
- **Profile**: avatar inisial, username, bio, target baca tahunan, dan genre favorit.
- **Responsif**: tampilan menyesuaikan mobile, tablet, dan desktop. Navbar punya menu mobile.

## Teknologi

- PHP 8.5 & Laravel 13
- Blade Templating (`@extends`, `@section`, `@yield`, `@include`, x-component)
- Tailwind CSS v4 (CDN) & font Inter (Google Fonts)

## Struktur File Penting

```
app/Http/Controllers/PageController.php   # logika halaman, data buku, statistik
routes/web.php                            # 4 route GET
resources/views/
├── layouts/app.blade.php                 # layout utama
├── components/
│   ├── navbar.blade.php                  # x-component <x-navbar>
│   └── footer.blade.php                  # partial via @include
├── login.blade.php
├── dashboard.blade.php
├── pengelolaan.blade.php
└── profile.blade.php
```

## Daftar Route

| Method | URL            | Nama route    | Controller                   |
|--------|----------------|---------------|------------------------------|
| GET    | `/`            | `login`       | `PageController@login`       |
| GET    | `/dashboard`   | `dashboard`   | `PageController@dashboard`   |
| GET    | `/pengelolaan` | `pengelolaan` | `PageController@pengelolaan` |
| GET    | `/profile`     | `profile`     | `PageController@profile`     |

## Cara Menjalankan

```bash
git clone <url-repository>
cd buku
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Buka `http://127.0.0.1:8000`, masukkan username, lalu klik **Masuk**.

> Tailwind dimuat lewat CDN, jadi perlu koneksi internet dan tidak perlu `npm install`.

## Screenshot

### Login
![Halaman Login](docs/screenshots/login.png)

### Dashboard
![Halaman Dashboard](docs/screenshots/dashboard.png)

### Pengelolaan
![Halaman Pengelolaan](docs/screenshots/pengelolaan.png)

### Profile
![Halaman Profile](docs/screenshots/profile.png)

### Tampilan Mobile
![Tampilan Mobile](docs/screenshots/mobile.png)

## Penulis

- Nama: _(isi nama)_
- NIM: _(isi NIM)_
- Kelas: _(isi kelas)_
