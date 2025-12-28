<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dokter</title>
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
            background: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #c0392b;
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
            background-color: #e74c3c;
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
        .action-links a, .action-links button {
            padding: 5px 10px;
            border-radius: 3px;
            text-decoration: none;
            font-size: 12px;
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
            color: #e74c3c;
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
        <h1>👨‍⚕️ Daftar Dokter</h1>
        
        <a href="{{ route('dokter.create') }}" class="btn">+ Tambah Dokter Baru</a>

        @if($dokters->count())
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Spesialisasi</th>
                        <th>Nomor Lisensi</th>
                        <th>No. Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dokters as $dokter)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dokter->nama }}</td>
                            <td>{{ $dokter->spesialisasi }}</td>
                            <td>{{ $dokter->nomor_lisensi }}</td>
                            <td>{{ $dokter->no_telepon }}</td>
                            <td>{{ $dokter->email }}</td>
                            <td>
                                <div class="action-links">
                                    <a href="{{ route('dokter.show', $dokter->id) }}" class="view-link">Lihat</a>
                                    <a href="{{ route('dokter.edit', $dokter->id) }}" class="edit-link">Edit</a>
                                    <form method="POST" action="{{ route('dokter.destroy', $dokter->id) }}" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
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
                <p>Tidak ada data dokter. <a href="{{ route('dokter.create') }}" style="color: #e74c3c;">Tambah dokter baru</a></p>
            </div>
        @endif

        <nav>
            <a href="/">← Kembali ke Beranda</a>
            <a href="/pasien">Lihat Pasien →</a>
        </nav>
    </div>
</body>
</html>
