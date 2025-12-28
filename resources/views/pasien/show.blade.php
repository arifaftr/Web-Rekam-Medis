<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pasien - {{ $pasien->nama }}</title>
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
        .detail-group {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .detail-group label {
            font-weight: bold;
            color: #667eea;
            display: block;
            margin-bottom: 5px;
        }
        .detail-group p {
            color: #333;
            font-size: 16px;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 30px;
        }
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: all 0.3s;
        }
        .btn-primary {
            background: #667eea;
            color: white;
        }
        .btn-primary:hover {
            background: #764ba2;
        }
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background: #5a6268;
        }
        .btn-danger {
            background: #f44336;
            color: white;
        }
        .btn-danger:hover {
            background: #da190b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>👤 Detail Pasien</h1>
        
        <div class="detail-group">
            <label>Nama:</label>
            <p>{{ $pasien->nama }}</p>
        </div>

        <div class="detail-group">
            <label>Nomor Identitas:</label>
            <p>{{ $pasien->nomor_identitas }}</p>
        </div>

        <div class="detail-group">
            <label>Alamat:</label>
            <p>{{ $pasien->alamat }}</p>
        </div>

        <div class="detail-group">
            <label>No. Telepon:</label>
            <p>{{ $pasien->no_telepon }}</p>
        </div>

        <div class="detail-group">
            <label>Email:</label>
            <p>{{ $pasien->email }}</p>
        </div>

        <div class="detail-group">
            <label>Dibuat pada:</label>
            <p>{{ $pasien->created_at->format('d M Y H:i') }}</p>
        </div>

        <div class="action-buttons">
            <a href="/pasien" class="btn btn-secondary">← Kembali</a>
            <a href="/pasien/{{ $pasien->id }}/edit" class="btn btn-primary">✏️ Edit</a>
            <form method="POST" action="/pasien/{{ $pasien->id }}" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️ Hapus</button>
            </form>
        </div>
    </div>
</body>
</html>
