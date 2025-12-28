<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat - {{ $obat->nama }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
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
            border-color: #11998e;
            box-shadow: 0 0 5px rgba(17, 153, 142, 0.5);
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
            background: #11998e;
            color: white;
        }
        button[type="submit"]:hover {
            background: #38ef7d;
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
        <h1>✏️ Edit Obat</h1>
        
        <form action="{{ route('obat.update', $obat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama Obat *</label>
                <input type="text" id="nama" name="nama" required placeholder="Masukkan nama obat" value="{{ $obat->nama }}">
            </div>

            <div class="form-group">
                <label for="dosis">Dosis *</label>
                <input type="text" id="dosis" name="dosis" required placeholder="Contoh: 500mg, 2x sehari" value="{{ $obat->dosis }}">
            </div>

            <div class="form-group">
                <label for="harga">Harga (Rp) *</label>
                <input type="number" id="harga" name="harga" required placeholder="Masukkan harga obat" min="0" value="{{ $obat->harga }}">
            </div>

            <div class="form-group">
                <label for="stok">Stok *</label>
                <input type="number" id="stok" name="stok" required placeholder="Masukkan jumlah stok" min="0" value="{{ $obat->stok }}">
            </div>

            <div class="form-actions">
                <button type="submit">✅ Update</button>
                <a href="/obat" class="btn-cancel">❌ Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
