# 🚀 START HERE - Cara Menjalankan Aplikasi

## ⚡ Quick Start (3 Steps)

### Step 1: Buka Terminal 1
```bash
cd c:\laragon\www\rekam-medis-4
npm run dev
```
**Tunggu sampai ada output**:
```
VITE v7.3.1 ready in XXX ms
✜  Local:   http://localhost:5173/
```

### Step 2: Buka Terminal 2
```bash
cd c:\laragon\www\rekam-medis-4
php artisan serve
```
**Tunggu sampai ada output**:
```
Starting Laravel development server: http://localhost:8000
```

### Step 3: Buka Browser
```
http://localhost:8000
```

---

## ✅ Sekarang Semuanya Ada:

- ✅ Styling/CSS (Tailwind) dengan warna
- ✅ Layout profesional (header + sidebar)
- ✅ Logout button (di dropdown menu)
- ✅ User management (superadmin only)
- ✅ Semua halaman berwarna dan terstruktur

---

## 🔑 Login Credentials

```
Email: admin@rekammedis.local
Password: password123
```

---

## 📍 Menu Navigation

### Available Menus:
- **Dashboard** - Statistik dan ringkasan
- **Pasien** - Data pasien
- **Dokter** - Data dokter
- **Obat** - Data obat/farmasi
- **Rekam Medis** - Medical records
- **Kelola User** (Superadmin only) - User management

---

## 💡 Important Notes

⚠️ **Terminal harus tetap berjalan**:
- Terminal 1: `npm run dev` (Vite CSS/JS compiler)
- Terminal 2: `php artisan serve` (Laravel server)

❌ Jika ditutup, styling akan tidak berfungsi di development.

---

## 🆘 If Styling Still Missing

1. Hard refresh browser: `Ctrl+Shift+R`
2. Check Terminal 1 running: `npm run dev` should show "ready"
3. Clear cache:
   ```bash
   php artisan cache:clear
   php artisan view:clear
   ```

---

**Status**: 🟢 Ready to use!
