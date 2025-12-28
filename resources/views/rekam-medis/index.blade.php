<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Rekam Medis</title>
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
            max-width: 1200px;
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
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-bottom: 20px;
            background: #9b59b6;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #8e44ad;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }
        th {
            background-color: #9b59b6;
            color: white;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .action-links {
            display: flex;
            gap: 5px;
        }
        .action-links a, .action-links button {
            padding: 5px 10px;
            border-radius: 3px;
            text-decoration: none;
            font-size: 11px;
            transition: background 0.3s;
            border: none;
            cursor: pointer;
        }
        .view-link {
            background: #2196F3;
            color: white;
        }
        .view-link:hover {
            background: #0b7dda;
        }
        .edit-link {
            background: #4CAF50;
            color: white;
        }
        .edit-link:hover {
            background: #45a049;
        }
        .delete-link {
            background: #f44336;
            color: white;
        }
        .delete-link:hover {
            background: #da190b;
        }
        .empty-message {
            text-align: center;
            padding: 40px;
            color: #666;
        }
        nav {
            margin-top: 30px;
            text-align: center;
        }
        nav a {
            margin: 0 10px;
            color: #9b59b6;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📋 Daftar Rekam Medis</h1>
        
        <a href="{{ route('rekam-medis.create') }}" class="btn">+ Tambah Rekam Medis Baru</a>

        @if($rekamMedis->count())
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Diagnosa</th>
                        <th>Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekamMedis as $medis)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $medis->pasien->nama }}</td>
                            <td>{{ $medis->dokter->nama }}</td>
                            <td>{{ $medis->tanggal_kunjungan }}</td>
                            <td>{{ substr($medis->diagnosa, 0, 30) }}...</td>
                            <td>Rp. {{ number_format($medis->biaya, 0, ',', '.') }}</td>
                            <td>
                                <div class="action-links">
                                    <a href="{{ route('rekam-medis.show', $medis->id) }}" class="view-link">Lihat</a>
                                    <a href="{{ route('rekam-medis.edit', $medis->id) }}" class="edit-link">Edit</a>
                                    <form method="POST" action="{{ route('rekam-medis.destroy', $medis->id) }}" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-link">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-message">
                <p>Tidak ada data rekam medis. <a href="{{ route('rekam-medis.create') }}" style="color: #9b59b6;">Tambah rekam medis baru</a></p>
            </div>
        @endif

        <nav>
            <a href="/">← Kembali ke Beranda</a>
            <a href="/pasien">Lihat Pasien →</a>
        </nav>
    </div>
</body>
</html>
