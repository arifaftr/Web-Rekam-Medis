<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rekam Medis</title>
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
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
            transition: border-color 0.3s;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #9b59b6;
            box-shadow: 0 0 5px rgba(155, 89, 182, 0.5);
        }
        textarea {
            resize: vertical;
            min-height: 80px;
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
            background: #9b59b6;
            color: white;
        }
        button[type="submit"]:hover {
            background: #8e44ad;
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
        <h1>✏️ Edit Rekam Medis</h1>
        
        <form action="{{ route('rekam-medis.update', $rekamMedis->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="pasien_id">Pasien *</label>
                <select id="pasien_id" name="pasien_id" required>
                    @foreach($pasiens as $pasien)
                        <option value="{{ $pasien->id }}" {{ $rekamMedis->pasien_id == $pasien->id ? 'selected' : '' }}>{{ $pasien->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="dokter_id">Dokter *</label>
                <select id="dokter_id" name="dokter_id" required>
                    @foreach($dokters as $dokter)
                        <option value="{{ $dokter->id }}" {{ $rekamMedis->dokter_id == $dokter->id ? 'selected' : '' }}>{{ $dokter->nama }} ({{ $dokter->spesialisasi }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_kunjungan">Tanggal Kunjungan *</label>
                <input type="date" id="tanggal_kunjungan" name="tanggal_kunjungan" required value="{{ $rekamMedis->tanggal_kunjungan }}">
            </div>

            <div class="form-group">
                <label for="keluhan">Keluhan *</label>
                <textarea id="keluhan" name="keluhan" required placeholder="Masukkan keluhan pasien">{{ $rekamMedis->keluhan }}</textarea>
            </div>

            <div class="form-group">
                <label for="diagnosa">Diagnosa *</label>
                <textarea id="diagnosa" name="diagnosa" required placeholder="Masukkan diagnosa">{{ $rekamMedis->diagnosa }}</textarea>
            </div>

            <div class="form-group">
                <label for="resep">Resep</label>
                <textarea id="resep" name="resep" placeholder="Masukkan resep obat (opsional)">{{ $rekamMedis->resep }}</textarea>
            </div>

            <div class="form-group">
                <label for="biaya">Biaya (Rp)</label>
                <input type="number" id="biaya" name="biaya" placeholder="Masukkan biaya kunjungan" min="0" step="0.01" value="{{ $rekamMedis->biaya }}">
            </div>

            <div class="form-actions">
                <button type="submit">✅ Update</button>
                <a href="/rekam-medis" class="btn-cancel">❌ Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
