# CMS Dinas Perhubungan Kabupaten Purbalingga 🚍

Sistem Manajemen Konten (CMS) dan Portal Informasi Resmi Dinas Perhubungan Kabupaten Purbalingga dibangun menggunakan **Laravel 11** & **Filament v3**.

---

## 🛠️ Persyaratan Sistem (System Requirements)

Di ekosistem PHP/Laravel, daftar dependency dikelola secara otomatis oleh `composer.json` dan `package.json` (bukan `requirements.txt` seperti di Python).

Pastikan perangkat/server kamu telah terpasang:
- **PHP**: `>= 8.2` (Ekstensi wajib: `pdo`, `mbstring`, `openssl`, `fileinfo`, `gd` / `imagick`)
- **Database**: MySQL `>= 8.0` atau MariaDB `>= 10.4`
- **Composer**: `>= 2.5`
- **Node.js**: `>= 18.x` & **npm** `>= 9.x`

---

## 🚀 Panduan Instalasi & Memulai (Quick Start)

Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer baru / lokal:

### 1. Clone Repository & Masuk Folder
```bash
git clone https://github.com/gstyaaa/dinhub_cms_kab.purbalingga.git
cd dinhub_cms
```

### 2. Install Dependency PHP & Node.js
```bash
composer install
npm install
```

### 3. Konfigurasi Environment (`.env`)
Salin berkas `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
Buka berkas `.env` lalu sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dishub_cms
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate App Key & Jalankan Migration
```bash
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
```

### 5. Jalankan Server Lokal
Jalankan server Laravel dan kompiler asset di dua terminal terpisah:

**Terminal 1 (Laravel Server):**
```bash
php artisan serve
```

**Terminal 2 (Assets Builder):**
```bash
npm run dev
```

Aplikasi dapat diakses di browser melalui alamat:
- **Portal Publik**: `http://127.0.0.1:8000`
- **Panel Administrator**: `http://127.0.0.1:8000/admin`

---

## 💻 Fitur Utama Aplikasi

- 🏠 **Beranda & Banner Slider**: Banner spanduk utama dinamis dapat diubah dari Admin Panel.
- 📰 **Berita & Pengumuman**: Publikasi artikel berita dan pengumuman instansi lengkap dengan kategori.
- 💬 **Tanya Dinhub (Aspirasi Warga)**: Layanan permohonan informasi/pengaduan warga dengan notifikasi *pop-up modal* terintegrasi.
- 🏛️ **Profil Instansi & PPID**: Visi Misi, Tugas Fungsi, serta Bagan Organisasi & PPID Pelaksana berbasis HTML/CSS interaktif.
- 🖼️ **Galeri Dokumentasi**: Galeri foto kegiatan instansi.
- 📊 **Statistik Pengunjung**: Pencatatan pengunjung harian, bulanan, dan total secara otomatis berbasis enkripsi SHA-256 IP.

---

## 🔐 Kredensial Administrator Default

Setelah menjalankan `php artisan db:seed`, kamu dapat login ke admin panel menggunakan:
- **URL Login**: `http://127.0.0.1:8000/admin/login`
- **Email**: `admin@purbalinggakab.go.id`
- **Password**: `password` *(Harap ganti password setelah pertama kali login)*

---

## 📄 Lisensi

Hak Cipta © 2026 **Dinas Perhubungan Kabupaten Purbalingga**. Seluruh Hak Cipta Dilindungi.

