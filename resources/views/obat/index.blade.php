<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Obat</title>
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
            max-width: 1000px;
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
            background: #11998e;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #38ef7d;
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
        }
        th {
            background-color: #11998e;
            color: white;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .action-links {
            display: flex;
            gap: 10px;
        }
        .action-links a {
            padding: 5px 10px;
            border-radius: 3px;
            text-decoration: none;
            font-size: 12px;
            transition: background 0.3s;
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
            color: #11998e;
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
        <h1>💊 Daftar Obat</h1>
        
        <a href="{{ route('obat.create') }}" class="btn">+ Tambah Obat Baru</a>

        @if($obats->count())
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Dosis</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($obats as $obat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $obat->nama }}</td>
                            <td>{{ $obat->dosis }}</td>
                            <td>Rp. {{ number_format($obat->harga, 0, ',', '.') }}</td>
                            <td>{{ $obat->stok }}</td>
                            <td>
                                <div class="action-links">
                                    <a href="{{ route('obat.show', $obat->id) }}" class="view-link">Lihat</a>
                                    <a href="{{ route('obat.edit', $obat->id) }}" class="edit-link">Edit</a>
                                    <form method="POST" action="{{ route('obat.destroy', $obat->id) }}" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-link" style="border: none; cursor: pointer; padding: 5px 10px; border-radius: 3px;">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-message">
                <p>Tidak ada data obat. <a href="{{ route('obat.create') }}" style="color: #11998e;">Tambah obat baru</a></p>
            </div>
        @endif

        <nav>
            <a href="/">← Kembali ke Beranda</a>
            <a href="/pasien">Lihat Pasien →</a>
        </nav>
    </div>
</body>
</html>
