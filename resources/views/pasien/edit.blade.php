<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pasien - {{ $pasien->nama }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.5);
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
            background: #667eea;
            color: white;
        }
        button[type="submit"]:hover {
            background: #764ba2;
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
        <h1>✏️ Edit Pasien</h1>
        
        <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama *</label>
                <input type="text" id="nama" name="nama" required placeholder="Masukkan nama pasien" value="{{ $pasien->nama }}">
            </div>

            <div class="form-group">
                <label for="nomor_identitas">Nomor Identitas (KTP/Paspor) *</label>
                <input type="text" id="nomor_identitas" name="nomor_identitas" required placeholder="Masukkan nomor identitas" value="{{ $pasien->nomor_identitas }}">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat *</label>
                <textarea id="alamat" name="alamat" required placeholder="Masukkan alamat lengkap">{{ $pasien->alamat }}</textarea>
            </div>

            <div class="form-group">
                <label for="no_telepon">No. Telepon *</label>
                <input type="tel" id="no_telepon" name="no_telepon" required placeholder="Masukkan nomor telepon" value="{{ $pasien->no_telepon }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email" value="{{ $pasien->email }}">
            </div>

            <div class="form-actions">
                <button type="submit">✅ Update</button>
                <a href="/pasien" class="btn-cancel">❌ Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
