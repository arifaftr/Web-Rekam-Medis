<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Rekam Medis</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);
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
            color: #9b59b6;
            display: block;
            margin-bottom: 5px;
        }
        .detail-group p {
            color: #333;
            font-size: 16px;
            white-space: pre-wrap;
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
            background: #9b59b6;
            color: white;
        }
        .btn-primary:hover {
            background: #8e44ad;
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
        <h1>📋 Detail Rekam Medis</h1>
        
        <div class="detail-group">
            <label>Pasien:</label>
            <p>{{ $rekamMedis->pasien->nama }}</p>
        </div>

        <div class="detail-group">
            <label>Dokter:</label>
            <p>{{ $rekamMedis->dokter->nama }} ({{ $rekamMedis->dokter->spesialisasi }})</p>
        </div>

        <div class="detail-group">
            <label>Tanggal Kunjungan:</label>
            <p>{{ \Carbon\Carbon::parse($rekamMedis->tanggal_kunjungan)->format('d M Y') }}</p>
        </div>

        <div class="detail-group">
            <label>Keluhan:</label>
            <p>{{ $rekamMedis->keluhan }}</p>
        </div>

        <div class="detail-group">
            <label>Diagnosa:</label>
            <p>{{ $rekamMedis->diagnosa }}</p>
        </div>

        <div class="detail-group">
            <label>Resep:</label>
            <p>{{ $rekamMedis->resep ?? '-' }}</p>
        </div>

        <div class="detail-group">
            <label>Biaya:</label>
            <p>Rp. {{ number_format($rekamMedis->biaya, 0, ',', '.') }}</p>
        </div>

        <div class="action-buttons">
            <a href="/rekam-medis" class="btn btn-secondary">← Kembali</a>
            <a href="/rekam-medis/{{ $rekamMedis->id }}/edit" class="btn btn-primary">✏️ Edit</a>
            <form method="POST" action="/rekam-medis/{{ $rekamMedis->id }}" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️ Hapus</button>
            </form>
        </div>
    </div>
</body>
</html>
