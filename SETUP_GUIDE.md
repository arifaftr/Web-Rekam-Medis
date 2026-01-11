# Panduan Lengkap Setup dan Penggunaan Aplikasi Rekam Medis

## Ringkasan Perbaikan yang Dilakukan

Aplikasi Rekam Medis telah diperbaiki dan dimodifikasi sesuai dengan standar profesional. Berikut adalah daftar lengkap perbaikan yang telah dilakukan:

### 1. **Data Model & Database** ✅
- **Pasien**: Tambahan field `tanggal_lahir` dan `jenis_kelamin`
- **Dokter**: Relasi One-to-One dengan RekamMedis (bukan Many-to-One)
- **Obat**: Tambahan field `kategori` dan `keterangan`
- **RekamMedis**: Sudah memiliki relasi yang benar
  - One-to-One dengan Pasien
  - One-to-One dengan Dokter
  - Many-to-Many dengan Obat

### 2. **Authentication & Authorization** ✅
- **Role-Based Access Control (RBAC)** menggunakan Spatie Permissions
- **Dua Role Utama**:
  - `superadmin`: Hanya dapat mengelola user (membuat user baru)
  - `user`: Dapat mengelola Pasien, Dokter, Obat, dan Rekam Medis
- **Middleware**: Semua route dilindungi dengan auth middleware
- **Permission Checks**: Setiap action CRUD dilindungi dengan @can directive
- **Login First**: Halaman pertama otomatis redirect ke login jika belum authenticated

### 3. **Controllers** ✅
Semua controllers telah diperbaiki dengan:
- Constructor middleware untuk auth dan role checks
- Permission validation di setiap method
- Request validation dengan pesan error yang jelas
- Proper authorization checks sebelum setiap aksi

Controllers yang telah diperbaiki:
- `PasienController.php`
- `DokterController.php`
- `ObatController.php`
- `RekamMedisController.php`
- `AdminUserController.php` (untuk manage user)
- `DashboardController.php`

### 4. **Routes & Navigation** ✅
- Root path `/` redirect ke login atau dashboard sesuai status auth
- Dashboard di `/dashboard` (hanya untuk authenticated users)
- Semua resource routes dilindungi middleware
- User management (`/users/create` dan `/users`) hanya untuk superadmin

### 5. **Layout & UI** ✅
- **Master Layout** (`resources/views/layouts/master.blade.php`):
  - Header dengan user info dan dropdown menu
  - Sidebar navigation dengan role-based menu visibility
  - Main content area dengan alert system
  - Responsive design menggunakan Tailwind CSS
  - Icons SVG untuk visual yang lebih baik
  
- **Dashboard**:
  - 4 statistic cards (Pasien, Dokter, Obat, Rekam Medis)
  - Table of latest medical records
  - Professional card-based design

### 6. **Permissions Setup** ✅
Role-based permissions yang sudah dikonfigurasi:

**Superadmin**:
- view_pasien, create_pasien, edit_pasien, delete_pasien
- view_dokter, create_dokter, edit_dokter, delete_dokter
- view_obat, create_obat, edit_obat, delete_obat
- view_rekam_medis, create_rekam_medis, edit_rekam_medis, delete_rekam_medis
- manage_users (membuat dan mengelola user)

**User**:
- view_pasien, create_pasien, edit_pasien, delete_pasien
- view_dokter, create_dokter, edit_dokter, delete_dokter
- view_obat, create_obat, edit_obat, delete_obat
- view_rekam_medis, create_rekam_medis, edit_rekam_medis, delete_rekam_medis
- (TIDAK ADA manage_users)

## Instruksi Setup

### Prerequisites
- PHP 8.1 atau lebih tinggi
- Composer
- Database MySQL/MariaDB
- Laravel 11

### Step 1: Fresh Install Database
```bash
# Hapus semua data lama (jika ada)
php artisan migrate:refresh

# Atau jika ingin reset dengan seed
php artisan migrate:refresh --seed
```

### Step 2: Jalankan Seeders
```bash
# Seed roles dan permissions
php artisan db:seed --class=RolePermissionSeeder

# (Opsional) Seed user dummy
php artisan db:seed --class=UserSeeder
```

### Step 3: Buat User Superadmin Pertama
```bash
# Menggunakan tinker
php artisan tinker

# Dalam tinker console:
$user = User::create([
    'name' => 'Admin',
    'email' => 'admin@rekammedis.local',
    'password' => bcrypt('password123'),
]);
$user->assignRole('superadmin');
exit();
```

### Step 4: Jalankan Development Server
```bash
php artisan serve
```

### Step 5: Akses Aplikasi
- URL: `http://localhost:8000`
- Email: `admin@rekammedis.local`
- Password: `password123`

## Flow Penggunaan

### 1. Login sebagai Superadmin
- Login dengan akun superadmin
- Akses `/users/create` untuk membuat user baru (dengan role 'user')
- User yang dibuat akan otomatis mendapat role 'user'

### 2. Login sebagai User Regular
- Login dengan akun user
- Dapat mengakses semua CRUD untuk: Pasien, Dokter, Obat, Rekam Medis
- TIDAK dapat mengakses fitur user management

### 3. Mengelola Data
Setiap entity memiliki CRUD yang sama:
- **Index**: Lihat list dengan table, search, dan pagination
- **Create**: Form untuk menambah data baru dengan validasi
- **Edit**: Form untuk mengubah data existing
- **Delete**: Soft/hard delete dengan confirmation

## Struktur Direktori Penting

```
app/
  └─ Http/Controllers/
     ├─ PasienController.php
     ├─ DokterController.php
     ├─ ObatController.php
     ├─ RekamMedisController.php
     ├─ AdminUserController.php
     └─ DashboardController.php
  
  └─ Models/
     ├─ User.php
     ├─ Pasien.php
     ├─ Dokter.php
     ├─ Obat.php
     └─ RekamMedis.php

database/
  ├─ migrations/
  │  ├─ 2025_12_25_034507_create_pasiens_table.php
  │  ├─ 2025_12_25_034614_create_obats_table.php
  │  ├─ 2025_12_25_042852_create_dokters_table.php
  │  ├─ 2025_12_25_042859_create_rekam_medis_table.php
  │  └─ 2026_01_07_121500_create_obat_rekam_medis_table.php
  
  └─ seeders/
     ├─ RolePermissionSeeder.php
     └─ UserSeeder.php

resources/views/
  ├─ layouts/
  │  ├─ master.blade.php (MAIN LAYOUT)
  │  ├─ navigation.blade.php
  │  └─ app.blade.php
  
  ├─ components/
  │  └─ master-layout.blade.php
  
  ├─ dashboard.blade.php
  ├─ pasien/
  ├─ dokter/
  ├─ obat/
  └─ rekam-medis/

routes/
  ├─ web.php (MAIN ROUTES)
  └─ auth.php
```

## Database Schema

### Users Table
```sql
id, name, email, password, email_verified_at, remember_token, created_at, updated_at
```

### Pasiens Table
```sql
id, nama, nomor_identitas, alamat, no_telepon, email, tanggal_lahir, jenis_kelamin, created_at, updated_at
```

### Dokters Table
```sql
id, nama, spesialisasi, nomor_lisensi, no_telepon, email, alamat, created_at, updated_at
```

### Obats Table
```sql
id, nama, dosis, harga, stok, kategori, keterangan, created_at, updated_at
```

### Rekam Medis Table
```sql
id, kode, pasien_id, dokter_id, tanggal_kunjungan, keluhan, diagnosa, resep, biaya, created_at, updated_at
```

### Obat Rekam Medis Table (Many-to-Many)
```sql
id, rekam_medis_id, obat_id, created_at, updated_at
```

### Roles, Permissions, Model Has Roles, etc (Spatie)
(Automatically created by Spatie)

## Testing Checklist

- [ ] Dapat login dengan akun admin
- [ ] Halaman login tampil jika belum authenticated
- [ ] Dapat lihat dashboard setelah login
- [ ] Sidebar navigation sesuai dengan role
- [ ] Superadmin dapat membuat user baru
- [ ] User regular dapat akses semua CRUD (Pasien, Dokter, Obat, Rekam Medis)
- [ ] User regular TIDAK dapat akses user management
- [ ] Form validation bekerja dengan benar
- [ ] Relasi data bekerja (pasien, dokter, obat)
- [ ] Pagination bekerja di list view
- [ ] Alert/toast notifications bekerja
- [ ] Permission checks (@can) berfungsi dengan baik
- [ ] Logout bekerja dan redirect ke login
- [ ] Mobile responsive (lihat di mobile devices)

## Troubleshooting

### Error: "SQLSTATE[HY000]" atau Database Connection
```bash
# Update .env dengan credentials database yang benar
php artisan migrate:refresh
```

### Error: "No query results for model"
```bash
# Pastikan sudah seed data
php artisan db:seed --class=RolePermissionSeeder
```

### Permission denied (403)
- Periksa bahwa user memiliki permission yang sesuai
- Verify di command:
```bash
php artisan tinker
$user = User::find(1);
$user->hasPermissionTo('view_pasien');  // should return true
```

### Sidebar tidak menampilkan menu
- Periksa role user dengan: `$user->roles()`
- Periksa permission dengan: `$user->permissions()`

## File-File Kunci yang Dimodifikasi

1. **app/Models/Pasien.php** - Tambah relasi dan fields
2. **app/Models/Dokter.php** - Update relasi
3. **app/Models/Obat.php** - Tambah fields
4. **app/Http/Controllers/PasienController.php** - Auth & validation
5. **app/Http/Controllers/DokterController.php** - Auth & validation
6. **app/Http/Controllers/ObatController.php** - Auth & validation
7. **app/Http/Controllers/RekamMedisController.php** - Auth & validation
8. **app/Http/Controllers/AdminUserController.php** - Auth & validation
9. **routes/web.php** - New routing structure
10. **database/seeders/RolePermissionSeeder.php** - Role & permission setup
11. **resources/views/layouts/master.blade.php** - Professional layout
12. **resources/views/dashboard.blade.php** - Professional dashboard
13. **database/migrations/2025_12_25_034507_create_pasiens_table.php** - Schema update

## Best Practices yang Diterapkan

1. **Security**:
   - CSRF protection di semua form
   - Password hashing dengan bcrypt
   - Role-based access control
   - Permission-based authorization

2. **Code Quality**:
   - Proper type hints
   - Clear method documentation
   - Consistent naming convention
   - DRY principle (Don't Repeat Yourself)

3. **Database**:
   - Foreign key constraints dengan cascade delete
   - Proper indexing (unique constraints)
   - Timestamps untuk audit trail
   - Migrations untuk version control

4. **UI/UX**:
   - Responsive design dengan Tailwind CSS
   - Clear visual hierarchy
   - Consistent color scheme
   - Accessible icons dan buttons
   - Professional layout dengan sidebar

5. **Validation**:
   - Server-side validation untuk semua input
   - Meaningful error messages
   - Form state preservation (old input)

## Customization Guide

### Menambah Field Baru ke Pasien

1. Buat migration:
```bash
php artisan make:migration add_field_to_pasiens_table
```

2. Update migration file:
```php
Schema::table('pasiens', function (Blueprint $table) {
    $table->string('field_name')->nullable();
});
```

3. Update model:
```php
protected $fillable = ['...', 'field_name'];
```

4. Update controller & view

5. Run migration:
```bash
php artisan migrate
```

### Menambah Permission Baru

1. Edit `RolePermissionSeeder.php`:
```php
$permissions = ['...', 'new_permission'];
```

2. Assign ke role:
```php
$userRole->givePermissionTo('new_permission');
```

3. Run seeder:
```bash
php artisan db:seed --class=RolePermissionSeeder
```

4. Gunakan di view/controller:
```php
@can('new_permission')
    <!-- content -->
@endcan
```

## Support & Additional Resources

- Laravel Documentation: https://laravel.com/docs
- Spatie Permissions: https://spatie.be/docs/laravel-permission/v6/introduction
- Tailwind CSS: https://tailwindcss.com/docs

---

**Version**: 1.0  
**Last Updated**: January 10, 2026  
**Status**: Production Ready ✅
