### **1. Install & Run**

1. **Buat project Laravel baru:**
```bash
composer create-project laravel/laravel my-cellular
cd my-cellular
```

2. **Install dependencies:**
```bash
npm install
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init
```

3. **Copy semua file di atas ke direktori yang sesuai**

4. **Setup database di `.env`** lalu jalankan:
```bash
php artisan migrate
php artisan storage:link
php artisan db:seed
```

5. **Compile assets:**
```bash
npm run build
```

6. **Jalankan server:**
```bash
php artisan serve
```

7. **Akses admin dashboard:**
- URL: `http://localhost:8000/admin`
- Untuk production, tambahkan middleware auth


## 📋 Prasyarat Hosting

Pastikan server/shared hosting Anda memenuhi persyaratan berikut:
- **PHP** versi 8.1 atau lebih tinggi (Laravel 10/11 membutuhkan PHP 8.1+)
- **MySQL** atau MariaDB
- **cPanel** dengan File Manager (atau akses FTP)
- **Composer** (opsional, bisa dijalankan lokal)

---

## 🚀 Metode 1: Deployment Manual ke Shared Hosting (cPanel)

Metode ini cocok untuk shared hosting standar (Hostinger, Niagahoster, Rumahweb, dll) .

### Langkah 1: Persiapan File Project Lokal

Sebelum upload, persiapkan project Laravel Anda:

```bash
# 1. Install dependencies di lokal
composer install --no-dev --optimize-autoloader

# 2. Build assets jika menggunakan Vite
npm run build

# 3. Cache konfigurasi untuk production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 4. Zip seluruh folder project (kecuali node_modules)
```

Edit file `.env` untuk production :
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domainanda.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database
```

### Langkah 2: Upload File ke Hosting

Ada dua pendekatan struktur folder yang bisa dipilih:

#### Opsi A: Menggunakan Folder Terpisah (Direkomendasikan) 

Struktur folder yang aman:
```
/home/username/
├── laravelapp/          # Seluruh project Laravel (kecuali public)
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── vendor/
│   └── ...
└── public_html/         # Hanya isi folder public
    ├── index.php
    ├── .htaccess
    ├── css/
    ├── js/
    └── ...
```

**Cara menerapkan:**
1. Buat folder `laravelapp` di level yang sama dengan `public_html`
2. Upload ZIP project ke folder `laravelapp` dan ekstrak
3. Pindahkan **isi** folder `public` ke `public_html`

### Langkah 3: Modifikasi index.php

Edit file `public_html/index.php` :

```php
<?php

// Sebelumnya (path default):
// require __DIR__.'/../vendor/autoload.php';
// $app = require_once __DIR__.'/../bootstrap/app.php';

// Diubah menjadi (sesuaikan nama folder):
require __DIR__.'/../laravelapp/vendor/autoload.php';
$app = require_once __DIR__.'/../laravelapp/bootstrap/app.php';
```

### Langkah 4: Konfigurasi .htaccess

Buat file `.htaccess` di `public_html` dengan isi berikut :

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>

# Blokir akses ke file sensitif
<FilesMatch "^\.">
    Order allow,deny
    Deny from all
</FilesMatch>

# Blokir akses ke folder penting
RedirectMatch 403 ^/(app|bootstrap|config|database|resources|routes|storage|tests|vendor)/.*$
```

### Langkah 5: Atur Permission Folder

Set permission yang benar untuk folder storage :

```bash
# Via terminal jika tersedia, atau via File Manager cPanel
chmod -R 775 laravelapp/storage
chmod -R 775 laravelapp/bootstrap/cache
chmod -R 755 public_html
```

Di cPanel File Manager:
- Klik kanan folder `storage` → Change Permissions → 775
- Klik kanan folder `bootstrap/cache` → Change Permissions → 775

### Langkah 6: Setup Database

1. Buka cPanel → **MySQL Databases**
2. Buat database baru (contoh: `hpservice_db`)
3. Buat user baru (contoh: `hpservice_user`)
4. Assign user ke database dengan **ALL PRIVILEGES**
5. Update `.env` di folder `laravelapp` dengan kredensial tersebut

### Langkah 7: Jalankan Migrasi

Karena shared hosting biasanya tidak memiliki akses SSH/terminal, buat route sementara :

Tambahkan di `routes/web.php`:

```php
// HAPUS ROUTE INI SETELAH SELESAI!
Route::get('/run-migrate', function () {
    try {
        \Artisan::call('migrate', ['--force' => true]);
        return 'Migration berhasil dijalankan';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/storage-link', function () {
    try {
        \Artisan::call('storage:link');
        return 'Storage link berhasil dibuat';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});
```

Setelah migrasi berhasil, **SEGERA HAPUS ROUTE TERSEBUT** untuk keamanan!

### Langkah 8: Generate App Key

Jika belum punya APP_KEY di `.env`, buat file PHP sederhana:

```php
<?php
// Simpan sebagai generate-key.php di public_html
echo 'Base64 Key: ' . base64_encode(random_bytes(32));
```

Akses `https://domainanda.com/generate-key.php`, copy hasilnya ke `.env`:

```env
APP_KEY=base64:hasil_key_anda
```

**Hapus file generate-key.php setelah selesai!**

---

## 🚀 Metode 2: Deployment dengan Git (SSH)

Jika hosting Anda mendukung akses SSH :

### Langkah 1: Setup SSH Key

```bash
# Di lokal
ssh-keygen -t rsa -b 4096 -C "email@example.com"

# Copy public key ke server
cat ~/.ssh/id_rsa.pub
```

### Langkah 2: Setup Repository di Server

```bash
ssh username@domainanda.com

# Buat bare repository
mkdir -p ~/repos/laravel-app.git
cd ~/repos/laravel-app.git
git init --bare

# Buat post-receive hook
nano hooks/post-receive
```

Isi `hooks/post-receive`:

```bash
#!/bin/sh
GIT_WORK_TREE=/home/username/laravelapp git checkout -f
cd /home/username/laravelapp
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
chmod -R 775 storage bootstrap/cache
```

```bash
chmod +x hooks/post-receive
```

### Langkah 3: Deploy dari Lokal

```bash
git remote add live ssh://username@domainanda.com/home/username/repos/laravel-app.git
git push live main
```

---

## 🛡️ Keamanan Post-Deployment

### 1. Proteksi File .env
Tambahkan di `.htaccess`:
```apache
<Files ".env">
    Order Allow,Deny
    Deny from all
</Files>
```

### 2. Nonaktifkan Debug Mode
Pastikan `APP_DEBUG=false` di `.env`

### 3. Hapus Route Migrasi Sementara
Setelah migrasi selesai, hapus route `/run-migrate`

### 4. Atur Permission Ketat
```bash
find public_html -type f -exec chmod 644 {} \;
find public_html -type d -exec chmod 755 {} \;
chmod -R 775 laravelapp/storage
```

---

## 🧪 Testing Pasca-Deployment

1. **Cek halaman utama** - Apakah tampil dengan benar?
2. **Cek koneksi database** - Apakah data muncul?
3. **Cek upload gambar** - Apakah gallery bisa diupload via admin?
4. **Cek form testimoni** - Apakah bisa submit?
5. **Cek form kontak** - Apakah redirect ke WhatsApp berfungsi?
6. **Cek halaman admin** - Apakah bisa login dan mengelola konten?

---

## 🔧 Mengatasi Masalah Umum

| Masalah | Penyebab | Solusi |
|---------|----------|--------|
| **500 Internal Server Error** | Path index.php salah atau permission | Periksa path di index.php, pastikan sesuai struktur folder  |
| **404 Not Found** | .htaccess tidak berfungsi | Pastikan mod_rewrite aktif di server |
| **Storage link error** | Symlink tidak bisa dibuat | Gunakan route `/storage-link` seperti di atas  |
| **White screen / blank page** | APP_DEBUG=false menyembunyikan error | Set sementara `APP_DEBUG=true`, cek log di `storage/logs` |
| **Gambar tidak muncul** | Path asset salah | Pastikan aset menggunakan `asset()` helper |
| **Migration error** | Koneksi database salah | Cek kredensial di `.env`  |
| **Class not found** | Autoload tidak update | Jalankan `composer dump-autoload` di lokal, upload ulang vendor |

---

## 📧 Konfigurasi Email (Jika Menggunakan)

Jika hosting tidak memiliki SSL untuk email, tambahkan di `config/mail.php` :

```php
'stream' => [
    'ssl' => [
        'allow_self_signed' => true,
        'verify_peer' => false,
        'verify_peer_name' => false,
    ],
],
```

---

## 📝 Checklist Deployment

- [ ] PHP versi 8.1+ di server
- [ ] `.env` diisi dengan benar (APP_DEBUG=false, DB credentials)
- [ ] Folder `storage` dan `bootstrap/cache` writable (775)
- [ ] `index.php` path sudah diupdate
- [ ] `.htaccess` terpasang dengan benar
- [ ] Migrasi database sudah dijalankan
- [ ] APP_KEY sudah digenerate
- [ ] Storage link sudah dibuat
- [ ] Route migrasi sementara sudah dihapus
- [ ] Semua asset (CSS/JS/images) muncul dengan benar
- [ ] Admin dashboard berfungsi

---