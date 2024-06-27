# UAS_BACKEND

#### Menginstal
Instal perpustakaan dengan Komposer:

`composer install`

Instal paket dengan NPM:

`npm install`

### Membuat berkas .env Anda

Silakan gunakan [template.env](./template.env) untuk file `.env` Anda. Anda harus mengganti nama database, nama pengguna, dan kata sandi dengan kredensial server mysql lokal Anda dan alamat email. Semua bidang yang wajib diisi diawali dengan `!!REPLACE`

Setelah membuat file `.env`, jalankan `php artisan key:generate` untuk mengisi kolom `APP_KEY`.

! Migrasi Anda akan gagal jika Anda tidak mengatur informasi database Anda dengan benar di `.env`.

### Jalankan migrasi

`php artisan migrate`

## Memulai Aplikasi
### Melayani
`php artisan serve`

## Penyelesaian masalah

- Ada yang salah dengan table? Coba jalankan `php artisan migrasi:segar`
- Ada yang salah secara umum? Coba jalankan `php artisan cache:clear`