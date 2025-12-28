<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dokter Baru</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
            transition: border-color 0.3s;
        }
        input:focus, textarea:focus {
            outline: none;
            border-color: #e74c3c;
            box-shadow: 0 0 5px rgba(231, 76, 60, 0.5);
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
        button, a {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s;
        }
        button[type="submit"] {
            background: #e74c3c;
            color: white;
        }
        button[type="submit"]:hover {
            background: #c0392b;
        }
        .btn-cancel {
            background: #6c757d;
            color: white;
        }
        .btn-cancel:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>👨‍⚕️ Tambah Dokter Baru</h1>
        
        <form action="{{ route('dokter.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama">Nama Dokter *</label>
                <input type="text" id="nama" name="nama" required placeholder="Masukkan nama dokter">
            </div>

            <div class="form-group">
                <label for="spesialisasi">Spesialisasi *</label>
                <input type="text" id="spesialisasi" name="spesialisasi" required placeholder="Contoh: Umum, Gigi, Jantung">
            </div>

            <div class="form-group">
                <label for="nomor_lisensi">Nomor Lisensi *</label>
                <input type="text" id="nomor_lisensi" name="nomor_lisensi" required placeholder="Masukkan nomor lisensi">
            </div>

            <div class="form-group">
                <label for="no_telepon">No. Telepon *</label>
                <input type="tel" id="no_telepon" name="no_telepon" required placeholder="Masukkan nomor telepon">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email dokter">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" placeholder="Masukkan alamat dokter"></textarea>
            </div>

            <div class="form-actions">
                <button type="submit">✅ Simpan</button>
                <a href="/dokter" class="btn-cancel">❌ Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
