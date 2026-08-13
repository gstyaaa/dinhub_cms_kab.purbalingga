# CMS Dinas Perhubungan Kabupaten Purbalingga 🚍

Sistem Manajemen Konten (CMS) dan Portal Informasi Resmi Dinas Perhubungan Kabupaten Purbalingga dibangun menggunakan **Laravel 13** (`^13.8`), **Filament v5** (`^5.6`), dan **Vite 8** (`^8.0.0`).

---

## 🛠️ Persyaratan Sistem (System Requirements)

Pastikan perangkat atau server produksi telah memenuhi spesifikasi berikut:
- **PHP**: `>= 8.3` (Ekstensi wajib: `pdo_mysql`, `mbstring`, `openssl`, `fileinfo`, `gd`/`imagick`, `xml`, `ctype`, `tokenizer`, `bcmath`, `curl`)
- **Database**: MySQL `>= 8.0` atau MariaDB `>= 10.4`
- **Composer**: `>= 2.5`
- **Node.js**: `>= 18.x` & **npm** `>= 9.x`

---

## 🔐 Kredensial Administrator Default

Akun administrator awal di-generate secara otomatis saat menjalankan proses seeding database.
- **URL Panel Admin**: `https://domain-anda.go.id/admin/login` (atau `http://127.0.0.1:8000/admin/login` untuk lokal)
- **Kredensial Login**: Merujuk pada seeder di `database/seeders/DatabaseSeeder.php` *(Sangat disarankan untuk segera memperbarui password setelah pertama kali masuk melalui menu profil Admin Panel)*.

---

## 🌐 1. Panduan Deployment / Hosting (Server Production)

Panduan utama untuk mempublikasikan proyek ke server hosting / VPS:

### A. Persyaratan Server Production
- **PHP**: `>= 8.3` (Ekstensi aktif: `pdo_mysql`, `mbstring`, `openssl`, `fileinfo`, `gd`, `xml`, `curl`)
- **Database**: MySQL `>= 8.0` / MariaDB `>= 10.4`
- **Web Server**: Nginx / Apache (dengan `mod_rewrite` aktif)
- **Composer**: `>= 2.5` & **Node.js**: `>= 18.x`

### B. Langkah Deployment (VPS / cPanel Terminal)
```bash
# 1. Clone repository & install dependencies PHP (tanpa paket dev)
git clone https://github.com/gstyaaa/dinhub_cms_kab.purbalingga.git dishub_cms
cd dishub_cms
composer install --no-dev --optimize-autoloader

# 2. Install Node modules & build Vite assets produksi
npm install
npm run build

# 3. Setup environment (.env)
cp .env.example .env
# Edit .env: set APP_ENV=production, APP_DEBUG=false, & kredensial database

# 4. Generate App Key & Database Setup
php artisan key:generate
php artisan migrate --force --seed
php artisan storage:link

# 5. Caching & Optimasi Performance Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
php artisan filament:cache-components

# 6. Set Izin Akses Folder Storage & Bootstrap
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

> ⚠️ **PENTING**: Arahkan **Document Root** Nginx / Apache secara langsung ke sub-folder `public/` (bukan root folder proyek).

---

## 💻 2. Panduan Menjalankan di Komputer Lokal (Development)

Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal:

### 1. Install Dependency & Setup Environment
```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

### 2. Setup Database Lokal (`.env`)
Pastikan MySQL XAMPP/Laragon aktif, lalu atur `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dishub_cms
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Migrasi Database & Storage Link
```bash
php artisan migrate --seed
php artisan storage:link
```

### 4. Jalankan Server Lokal (2 Terminal)
* **Terminal 1 (Server Laravel)**: `php artisan serve`
* **Terminal 2 (Vite Asset Builder)**: `npm run dev`

---

## 💻 3. Fitur Utama Aplikasi

- 🏠 **Beranda & Banner Slider**: Banner spanduk utama dinamis dapat diubah dari Admin Panel.
- 📰 **Berita & Pengumuman**: Publikasi artikel berita dan pengumuman instansi lengkap dengan kategori.
- 💬 **Tanya Dinhub (Aspirasi Warga)**: Layanan permohonan informasi/pengaduan warga dengan notifikasi *pop-up modal* terintegrasi.
- 🏛️ **Profil Instansi & PPID**: Visi Misi, Tugas Fungsi, serta Bagan Organisasi & PPID Pelaksana berbasis HTML/CSS interaktif.
- 🖼️ **Galeri Dokumentasi**: Galeri foto kegiatan instansi.
- 📊 **Statistik Pengunjung**: Pencatatan pengunjung harian, bulanan, dan total secara otomatis berbasis enkripsi SHA-256 IP.

---

## 📄 Lisensi

Hak Cipta © 2026 **Dinas Perhubungan Kabupaten Purbalingga**. Seluruh Hak Cipta Dilindungi.
