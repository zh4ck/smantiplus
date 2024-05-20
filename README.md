
---

# smanti+

smanti+ adalah aplikasi web OSIS SMANTI yang dibangun menggunakan Laravel 9. Aplikasi ini dirancang untuk membantu mengelola informasi di SMANTI (SMAN 3 Kota Bogor).


## Persyaratan Sistem

- PHP >= 8.0
- Composer
- MySQL atau MariaDB
- Node.js & npm 

## Instalasi

Ikuti langkah-langkah di bawah ini untuk menginstal dan menjalankan proyek `smantiplus` di lokal Anda.

### 1. Clone Repository

Clone repository dari GitHub:

```bash
git clone https://github.com/mirachelcindejona/smantiplus.git
cd smantiplus
```

### 2. Install Dependencies

Install semua dependensi menggunakan Composer dan npm:

```bash
composer install
npm install
```

### 3. Salin File Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

### 4. Generate Application Key

Generate application key untuk Laravel:

```bash
php artisan key:generate
```

### 5. Buat Database

Buat database MySQL baru. Anda dapat menggunakan alat seperti phpMyAdmin, MySQL Workbench, atau melalui command line:

```sql
CREATE DATABASE smantiplus;
```

### 6. Konfigurasi Environment

Buka file `.env` dan sesuaikan konfigurasi database Anda dengan informasi database yang baru dibuat:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smantiplus
DB_USERNAME=username_database
DB_PASSWORD=password_database
```

### 7. Aktifkan Direktori Storage

Setel izin untuk direktori `storage` dan `bootstrap/cache`:

```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

Setel owner direktori (opsional, tergantung konfigurasi server Anda):

```bash
sudo chown -R www-data:www-data storage
sudo chown -R www-data:www-data bootstrap/cache
```

Buat symlink untuk storage:

```bash
php artisan storage:link
```

### 8. Migrasi dan Seed Database

Jalankan migrasi dan seed database:

```bash
php artisan migrate --seed
```

### 9. Jalankan Server Pengembangan

Jalankan server pengembangan Laravel:

```bash
php artisan serve
```

Akses aplikasi di `http://localhost:8000`.

### 10. Compile Aset Front-end

Compile aset front-end menggunakan npm:

```bash
npm run dev
```


## Lisensi

Proyek ini dilisensikan di bawah lisensi MIT. Lihat file [LICENSE](LICENSE) untuk informasi lebih lanjut.
