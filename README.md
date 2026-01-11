# 🏥 Sistem Rekam Medis - Aplikasi Web

**Versi**: 2.0  
**Status**: 🟢 Production Ready  
**Terakhir Diperbarui**: 11 Januari 2026

---

## 📋 Deskripsi Umum Aplikasi

**Sistem Rekam Medis** adalah aplikasi web berbasis Laravel yang dirancang untuk mengelola dan mencatat riwayat medis pasien secara terstruktur dan profesional. Aplikasi ini memudahkan klinik atau rumah sakit dalam mengelola data pasien, dokter, obat, dan rekam medis kunjungan pasien dengan sistem keamanan berbasis role.

Dengan antarmuka yang intuitif dan responsif, aplikasi ini dapat diakses dari berbagai perangkat (desktop, tablet, mobile) dan dilengkapi dengan fitur keamanan standar enterprise seperti role-based access control (RBAC) dan permission management.

---

## ✨ Fitur Utama

### 1. **Manajemen Pasien** 👥
- CRUD (Create, Read, Update, Delete) data pasien
- Menyimpan informasi: Nama, Nomor Identitas, Alamat, Telepon, Email, Tanggal Lahir, Jenis Kelamin
- Daftar pasien dengan pagination
- Detail view untuk setiap pasien

### 2. **Manajemen Dokter** 👨‍⚕️
- CRUD data dokter
- Informasi dokter: Nama, Spesialisasi, Nomor Lisensi, Telepon, Email, Alamat
- List dokter dengan filter dan pagination
- Detail view untuk setiap dokter

### 3. **Manajemen Obat** 💊
- CRUD data obat/farmasi
- Tracking stok obat
- Informasi: Nama, Dosis, Harga, Stok, Kategori, Keterangan
- Alert stok obat
- List obat dengan pagination

### 4. **Rekam Medis** 📋
- CRUD rekam medis kunjungan pasien
- Pencatatan lengkap: Kode Rekam Medis, Pasien, Dokter, Tanggal Kunjungan, Keluhan, Diagnosa, Resep Obat, Biaya
- Relasi otomatis dengan pasien, dokter, dan obat
- List rekam medis dengan pagination
- Detail view dengan informasi lengkap

### 5. **Manajemen User** 🔐
- CRUD user/akun (hanya untuk Superadmin)
- Membuat user baru dengan role otomatis
- Edit profil user (nama, email, password)
- Delete user dengan proteksi (tidak bisa hapus user sendiri)
- Daftar user dengan pagination dan role badges

### 6. **Dashboard Statistik** 📊
- Menampilkan statistik: Jumlah Pasien, Dokter, Obat, Rekam Medis
- Tabel rekam medis terbaru
- Section "Kelola User Sistem" (untuk Superadmin saja)
- Data real-time dengan visual yang menarik

### 7. **Autentikasi & Otorisasi** 🔒
- Login/Register dengan validasi keamanan
- Role-based access control (RBAC)
- Permission-based authorization
- Session management
- Password hashing dengan bcrypt

---

## 👥 Role & Hak Akses

### **Superadmin** 👑
Memiliki hak akses penuh terhadap fitur user management:
- ✅ Lihat dashboard dengan statistik lengkap
- ✅ **Tambah User Baru** (hanya fitur ini untuk superadmin)
- ✅ **Lihat Semua User** dengan daftar lengkap
- ✅ **Edit User** (nama, email, password)
- ✅ **Hapus User** (dengan proteksi tidak bisa hapus diri sendiri)
- ❌ Tidak bisa mengakses CRUD Pasien, Dokter, Obat, Rekam Medis

### **User (Regular)** 👤
Memiliki hak akses penuh terhadap data medis:
- ✅ Lihat dashboard dengan statistik
- ✅ **Kelola Pasien** (CRUD lengkap)
- ✅ **Kelola Dokter** (CRUD lengkap)
- ✅ **Kelola Obat** (CRUD lengkap)
- ✅ **Kelola Rekam Medis** (CRUD lengkap)
- ❌ Tidak bisa mengakses fitur user management

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Versi | Fungsi |
|-----------|-------|--------|
| **Laravel** | 11.x | Framework backend |
| **PHP** | 8.1+ | Server-side language |
| **MySQL/MariaDB** | 5.7+ | Database |
| **Blade** | Built-in | Template engine |
| **Tailwind CSS** | 3.x | Styling & responsif |
| **Vite** | Latest | Asset bundler |
| **Spatie Permission** | 6.x | Role & permission management |
| **Eloquent ORM** | Built-in | Database abstraction |

---

## 💻 Kebutuhan Sistem

### Minimum Requirements
- **PHP**: 8.1 atau lebih tinggi
- **Composer**: Versi terbaru
- **Database**: MySQL 5.7+ atau MariaDB 10.3+
- **Node.js**: 14+ (untuk asset compilation)
- **Server**: Apache atau Nginx dengan .htaccess support

### Software yang Harus Diinstal
```bash
✅ PHP 8.1+
✅ Composer
✅ MySQL/MariaDB
✅ Node.js & npm
✅ Laravel 11
```

---

## 🚀 Instalasi & Setup

### Step 1: Clone atau Download Project
```bash
git clone https://github.com/arifaftr/Web-Rekam-Medis.git
```

### Step 2: Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### Step 3: Setup Environment
```bash
# Copy .env.example ke .env
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Konfigurasi Database
Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rekam_medis
DB_USERNAME=root
DB_PASSWORD=
```

### Step 5: Migrasi & Seed Database
```bash
# Jalankan migrasi database
php artisan migrate:refresh

# Seed roles dan permissions
php artisan db:seed --class=RolePermissionSeeder

# Seed data user awal
php artisan db:seed --class=UserSeeder
```

### Step 6: Build Assets
```bash
# Development
npm run dev

# Production
npm run build
```

### Step 7: Jalankan Aplikasi

**Terminal 1 - Vite Development Server:**
```bash
npm run dev
```

**Terminal 2 - Laravel Development Server:**
```bash
php artisan serve
```

**Akses Browser:**
```
http://localhost:8000
```

---

## 🔑 Akun Default

Setelah selesai setup, gunakan akun default berikut:

### Akun Superadmin
```
📧 Email    : admin4@gmail.com
🔐 Password : 12345678
👑 Role     : Superadmin
```

### Akun User Regular
```
📧 Email    : kelompok4@gmail.com
🔐 Password : 12345678
👤 Role     : User
```

> ⚠️ **Penting**: Ubah password akun default setelah login pertama untuk keamanan!

---

## 📊 Struktur Database (Ringkas)

### Tabel Utama

| Tabel | Deskripsi | Fields Penting |
|-------|-----------|----------------|
| **users** | Data user/akun | name, email, password |
| **pasiens** | Data pasien | nama, nomor_identitas, alamat, tanggal_lahir |
| **dokters** | Data dokter | nama, spesialisasi, nomor_lisensi |
| **obats** | Data obat | nama, dosis, harga, stok |
| **rekam_medis** | Rekam medis kunjungan | kode, pasien_id, dokter_id, diagnosa, biaya |
| **obat_rekam_medis** | Relasi obat-rekam medis | rekam_medis_id, obat_id (junction table) |

### Relasi Utama
```
Pasien          ──→ Rekam Medis ←── Dokter
                        ↓
                    Obat (Many-to-Many)
```

---

## 📂 Struktur Project

```
rekam-medis-4/
├── app/
│   ├── Http/Controllers/
│   │   ├── PasienController.php
│   │   ├── DokterController.php
│   │   ├── ObatController.php
│   │   ├── RekamMedisController.php
│   │   ├── AdminUserController.php
│   │   └── DashboardController.php
│   └── Models/
│       ├── User.php
│       ├── Pasien.php
│       ├── Dokter.php
│       ├── Obat.php
│       └── RekamMedis.php
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── RolePermissionSeeder.php
│       └── UserSeeder.php
├── resources/views/
│   ├── layouts/
│   │   └── master.blade.php
│   ├── components/
│   │   └── master-layout.blade.php
│   ├── dashboard.blade.php
│   ├── pasien/
│   ├── dokter/
│   ├── obat/
│   ├── rekam-medis/
│   └── users/
├── routes/
│   ├── web.php
│   └── auth.php
└── public/
```

---

## 📖 Dokumentasi Lengkap

Untuk panduan lebih detail, silakan baca file-file dokumentasi berikut:

| File | Deskripsi |
|------|-----------|
| [`SETUP_GUIDE.md`](SETUP_GUIDE.md) | Panduan instalasi dan konfigurasi lengkap |
| [`QUICKSTART.md`](QUICKSTART.md) | Quick start dalam 5 menit |
| [`START_HERE.md`](START_HERE.md) | Cara menjalankan aplikasi |
| [`USER_MANAGEMENT.md`](USER_MANAGEMENT.md) | Panduan user management |
| [`IMPLEMENTATION_CHECKLIST.md`](IMPLEMENTATION_CHECKLIST.md) | Checklist implementasi fitur |
| [`FINAL_STATUS_REPORT.md`](FINAL_STATUS_REPORT.md) | Status akhir aplikasi |

---

## 🔒 Keamanan

Aplikasi ini mengimplementasikan best practices keamanan:

✅ **CSRF Protection** - Semua form dilindungi token CSRF  
✅ **Password Hashing** - Password di-hash dengan bcrypt  
✅ **SQL Injection Prevention** - Menggunakan Eloquent ORM  
✅ **XSS Protection** - Blade template escaping otomatis  
✅ **Authentication** - Session-based authentication  
✅ **Authorization** - Role dan permission-based access control  
✅ **Input Validation** - Server-side validation di semua form  

---

## 🤝 Kontribusi & Support

Untuk laporan bug atau saran improvement, silakan:
1. Periksa dokumentasi yang tersedia
2. Baca file troubleshooting di [SETUP_GUIDE.md](SETUP_GUIDE.md#troubleshooting)
3. Hubungi tim development

---

## 📄 Lisensi

Aplikasi ini dikembangkan untuk keperluan tugas matakuliah Pemrograman Fullstack.

---

## 🎯 Kesimpulan

**Sistem Rekam Medis** adalah solusi manajemen medis yang profesional, aman, dan mudah digunakan. Dengan fitur lengkap mulai dari manajemen pasien, dokter, obat, hingga rekam medis kunjungan, aplikasi ini membantu meningkatkan efisiensi operasional klinik atau rumah sakit.

### Manfaat Utama:
- 📊 **Efisiensi Operasional** - Mengelola data medis dalam satu sistem terpadu
- 🔒 **Keamanan Data** - Role-based access control melindungi data sensitif pasien
- 📱 **Aksesibilitas** - Dapat diakses dari berbagai perangkat
- 🚀 **Skalabilitas** - Dibangun dengan teknologi modern yang dapat berkembang sesuai kebutuhan
- 👥 **User-Friendly** - Antarmuka intuitif yang mudah dipelajari

Semoga aplikasi ini bermanfaat dan membantu dalam meningkatkan kualitas layanan medis Anda!

---

**Versi**: 2.0  
**Status**: 🟢 Production Ready  
**Tanggal**: 10 Januari 2026

🎉 **Selamat menggunakan Sistem Rekam Medis!** 🎉
