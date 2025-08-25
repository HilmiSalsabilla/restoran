# Restoran

Sebuah aplikasi manajemen restoran berbasis web menggunakan Laravel dan Tailwind CSS.

## Deskripsi

Aplikasi ini dirancang untuk membantu restoran dalam mengelola menu, pesanan, dan transaksi secara efisien. Dengan antarmuka pengguna yang responsif dan fitur-fitur yang mudah digunakan, aplikasi ini bertujuan untuk meningkatkan produktivitas dan kepuasan pelanggan.

## Fitur Utama

- **Manajemen Menu**: Menambah, mengedit, dan menghapus item menu.
- **Manajemen Pesanan**: Melihat, mengonfirmasi, dan mengelola status pesanan.
- **Transaksi**: Mencatat transaksi dan menghasilkan laporan keuangan.
- **Antarmuka Responsif**: Desain yang kompatibel dengan berbagai perangkat.

## Teknologi yang Digunakan

- **Backend**: Laravel
- **Frontend**: Tailwind CSS, Vite
- **Database**: MySQL
- **Autentikasi**: Laravel Breeze
- **Testing**: PHPUnit

## Instalasi

1. Clone repositori ini:

   ```bash
   git clone https://github.com/HilmiSalsabilla/restoran.git
   cd restoran
   ```

2. Instal dependensi PHP menggunakan Composer:

   ```bash
   composer install
   ```

3. Salin file `.env.example` menjadi `.env`:

   ```bash
   cp .env.example .env
   ```

4. Generate key aplikasi:

   ```bash
   php artisan key:generate
   ```

5. Set konfigurasi database di file `.env`:

   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=nama_pengguna
   DB_PASSWORD=katasandi
   ```

6. Jalankan migrasi database:

   ```bash
   php artisan migrate
   ```

7. Instal dependensi frontend menggunakan npm:

   ```bash
   npm install
   ```

8. Jalankan server pengembangan:

   ```bash
   npm run dev
   php artisan serve
   ```

Aplikasi sekarang dapat diakses di `http://127.0.0.1:8000/`.

## Pengujian

Untuk menjalankan pengujian otomatis di Git Bash:

    ```bash
    php artisan serve
    "npm" run dev
    ```

## Kontribusi

Kontribusi sangat diterima! Silakan fork repositori ini, buat cabang baru (`git checkout -b fitur-anda`), buat perubahan, dan ajukan pull request.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

Made with ❤️ by [Hilmi Salsabilla](https://github.com/HilmiSalsabilla)
