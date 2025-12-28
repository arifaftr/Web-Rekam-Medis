<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Rekam Medis</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            text-align: center;
            color: white;
        }
        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        .subtitle {
            font-size: 1.2em;
            margin-bottom: 40px;
            opacity: 0.9;
        }
        .nav-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .btn {
            padding: 15px 40px;
            border: none;
            border-radius: 10px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        .btn-pasien {
            background: white;
            color: #667eea;
        }
        .btn-pasien:hover {
            background: #f0f0f0;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        .btn-obat {
            background: #38ef7d;
            color: white;
        }
        .btn-obat:hover {
            background: #11998e;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        .btn-dokter {
            background: #e74c3c;
            color: white;
        }
        .btn-dokter:hover {
            background: #c0392b;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        .btn-rekam {
            background: #9b59b6;
            color: white;
        }
        .btn-rekam:hover {
            background: #8e44ad;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        .footer {
            margin-top: 60px;
            opacity: 0.8;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🏥 Sistem Rekam Medis</h1>
        <p class="subtitle">Kelola data pasien dan obat dengan mudah</p>
        
        <div class="nav-buttons">
            <a href="/pasien" class="btn btn-pasien">👤 Kelola Pasien</a>
            <a href="/obat" class="btn btn-obat">💊 Kelola Obat</a>
            <a href="/dokter" class="btn btn-dokter">👨‍⚕️ Kelola Dokter</a>
            <a href="/rekam-medis" class="btn btn-rekam">📋 Rekam Medis</a>
        </div>

        <div class="footer">
            <p>© 2025 Sistem Rekam Medis - Semua Hak Dilindungi</p>
        </div>
    </div>
</body>
</html>
