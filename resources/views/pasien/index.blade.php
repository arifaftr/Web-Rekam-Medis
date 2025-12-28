<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pasien</title>
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
            padding-top: 70px;
        }
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0;
            display: flex;
            align-items: center;
            height: 70px;
            z-index: 1000;
        }
        .nav-brand {
            font-size: 24px;
            font-weight: bold;
            color: #667eea;
            margin-left: 30px;
            text-decoration: none;
        }
        .nav-links {
            display: flex;
            margin-left: auto;
            margin-right: 30px;
            gap: 0;
        }
        .nav-links a {
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: all 0.3s;
            border-bottom: 3px solid transparent;
        }
        .nav-links a:hover {
            color: #667eea;
            border-bottom-color: #667eea;
        }
        .nav-links a.active {
            color: #667eea;
            border-bottom-color: #667eea;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 30px;
            margin: 20px auto;
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
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #764ba2;
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
            background-color: #667eea;
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
    </style>
</head>
<body>
    <nav>
        <a href="/" class="nav-brand">🏥 Rekam Medis</a>
        <div class="nav-links">
            <a href="/" style="color: #667eea;">Home</a>
            <a href="/pasien" class="active">Pasien</a>
            <a href="/dokter">Dokter</a>
            <a href="/obat">Obat</a>
            <a href="/rekam-medis">Rekam Medis</a>
        </div>
    </nav>

    <div class="container">
        <h1>📋 Daftar Pasien</h1>
        
        <a href="{{ route('pasien.create') }}" class="btn">+ Tambah Pasien Baru</a>

        @if($pasiens->count())
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nomor Identitas</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pasiens as $pasien)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pasien->nama }}</td>
                            <td>{{ $pasien->nomor_identitas }}</td>
                            <td>{{ $pasien->alamat }}</td>
                            <td>{{ $pasien->no_telepon }}</td>
                            <td>{{ $pasien->email }}</td>
                            <td>
                                <div class="action-links">
                                    <a href="{{ route('pasien.show', $pasien->id) }}" class="view-link">Lihat</a>
                                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="edit-link">Edit</a>
                                    <form method="POST" action="{{ route('pasien.destroy', $pasien->id) }}" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
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
                <p>Tidak ada data pasien. <a href="{{ route('pasien.create') }}" style="color: #667eea;">Tambah pasien baru</a></p>
            </div>
        @endif
    </div>
</body>
</html>
