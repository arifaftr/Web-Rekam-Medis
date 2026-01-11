# Quick Start Guide - Aplikasi Rekam Medis

## 🚀 5 Menit Setup

### 1. Database Setup
```bash
# Terminal di folder project
php artisan migrate:refresh --seed
```

### 2. Seed Roles & Permissions
```bash
php artisan db:seed --class=RolePermissionSeeder
```

### 3. Create Superadmin
```bash
php artisan tinker
$user = User::create(['name' => 'Admin', 'email' => 'admin@rekammedis.local', 'password' => bcrypt('password123')]);
$user->assignRole('superadmin');
exit();
```

### 4. Start Server
```bash
php artisan serve
```

### 5. Login
- URL: `http://localhost:8000`
- Email: `admin@rekammedis.local`
- Password: `password123`

---

## 📊 System Architecture

```
┌─────────────────────────────────────────┐
│         USER INTERFACE (Blade)          │
│  - Master Layout dengan Sidebar         │
│  - Dashboard dengan Statistics          │
│  - CRUD Forms untuk setiap Entity       │
└─────────────┬───────────────────────────┘
              │
┌─────────────▼───────────────────────────┐
│      CONTROLLER LAYER                   │
│  - Auth Checks (@can directives)        │
│  - Form Validation                      │
│  - Business Logic                       │
└─────────────┬───────────────────────────┘
              │
┌─────────────▼───────────────────────────┐
│      ELOQUENT ORM (Models)              │
│  - Pasien (1-to-1 RekamMedis)          │
│  - Dokter (1-to-1 RekamMedis)          │
│  - Obat (M-to-M RekamMedis)            │
│  - RekamMedis (central hub)            │
└─────────────┬───────────────────────────┘
              │
┌─────────────▼───────────────────────────┐
│      DATABASE LAYER                     │
│  - 4 Main Tables                        │
│  - 1 Junction Table                     │
│  - Spatie Permission Tables             │
└─────────────────────────────────────────┘
```

---

## 🔐 Authentication Flow

1. User membuka aplikasi → Redirect ke Login
2. User login dengan email & password
3. Session dibuat, user mendapat role
4. Sidebar muncul sesuai role (superadmin/user)
5. Menu items hanya tampil jika user punya permission
6. Setiap aksi CRUD dilindungi @can directive

---

## 👥 User Management

### Superadmin
- Bisa membuat user baru (semua user auto dapat role 'user')
- Akses: `/users/create`
- Hanya fitur ini yang bisa dilakukan superadmin

### User Regular
- Akses penuh CRUD Pasien, Dokter, Obat, Rekam Medis
- Tidak bisa akses user management
- Default role ketika dibuat oleh superadmin

---

## 📝 Data Entry Workflow

### Typical Workflow:
1. **Registrasi Pasien** → Masuk ke Daftar Pasien
2. **Daftar Dokter** → Pastikan dokter sudah terdaftar
3. **Stok Obat** → Atur ketersediaan obat
4. **Buat Rekam Medis** → Pilih Pasien + Dokter + Obat + Data Kunjungan

### Example Data:
- Pasien: Budi (KTP: 3173051234567890)
- Dokter: Dr. Siti (Spesialisasi: Umum)
- Obat: Paracetamol (500mg, Rp 5.000)
- Rekam Medis: Budi visit Dr. Siti, minum Paracetamol

---

## 🎨 UI Components

### Master Layout Includes:
```
┌──────────────────────────────────┐
│        HEADER (User Profile)     │ ← Nama user, logout dropdown
├──────────┬──────────────────────┤
│          │                      │
│ SIDEBAR  │   MAIN CONTENT       │
│ (Menu)   │   (Dashboard/Forms)  │
│          │                      │
└──────────┴──────────────────────┘
```

### Colors:
- Primary: Blue (#3B82F6)
- Success: Green (#10B981)
- Danger: Red (#EF4444)
- Sidebar: Gray (#1F2937)

---

## ⚠️ Important Notes

1. **Migrations**: Sebelum mulai, jalankan `php artisan migrate:refresh`
2. **Seed Data**: Jalankan `RolePermissionSeeder` untuk setup roles
3. **First User**: Harus dibuat manual (superadmin) menggunakan tinker
4. **User Creation**: Hanya superadmin yang bisa buat user baru
5. **Password**: Semua password harus minimum 8 karakter

---

## 🔧 Common Commands

```bash
# View database
php artisan tinker
> User::all()  # Lihat semua user
> Role::all()  # Lihat semua role

# Reset everything
php artisan migrate:refresh --seed

# Create new user (tinker)
$user = User::create([...]);
$user->assignRole('user');

# Check user permissions
$user->permissions()  # Lihat permissions
$user->roles()       # Lihat roles
```

---

## 📚 File Structure Key

```
app/Models/
  ├─ User.php (HasRoles)
  ├─ Pasien.php
  ├─ Dokter.php
  ├─ Obat.php
  └─ RekamMedis.php

app/Http/Controllers/
  ├─ AdminUserController.php
  ├─ PasienController.php
  ├─ DokterController.php
  ├─ ObatController.php
  └─ RekamMedisController.php

resources/views/
  ├─ layouts/master.blade.php ← MAIN LAYOUT
  ├─ dashboard.blade.php
  ├─ pasien/
  ├─ dokter/
  ├─ obat/
  └─ rekam-medis/

database/
  ├─ migrations/ ← Schema
  └─ seeders/ ← Initial data
```

---

## 🐛 Troubleshooting

| Problem | Solution |
|---------|----------|
| Error: SQLSTATE | Update .env DB_HOST/USER/PASSWORD |
| 403 Forbidden | User tidak punya permission, cek roles |
| Login blank | Run: `php artisan migrate:refresh --seed` |
| Sidebar no menu | Check user roles: `$user->roles()` |
| Form error | Check validation messages on page |

---

## 📞 Next Steps

1. ✅ Setup sesuai Quick Start
2. ✅ Login dengan admin
3. ✅ Buat user baru
4. ✅ Login dengan user baru
5. ✅ Test CRUD Pasien/Dokter/Obat/Rekam Medis
6. 📖 Baca SETUP_GUIDE.md untuk detail lengkap
7. ✓ Cek IMPLEMENTATION_CHECKLIST.md untuk verifikasi

---

**Siap menggunakan? Mulai dari Step 1 di atas! 🚀**
