<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Obat;
use App\Models\RekamMedis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SampleDataSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample Pasiens
        $pasiens = [
            [
                'nama' => 'Budi Santoso',
                'nomor_identitas' => '1234567890123456',
                'alamat' => 'Jl. Merdeka No. 10, Jakarta',
                'no_telepon' => '08123456789',
                'email' => 'budi@example.com',
                'tanggal_lahir' => '1990-05-15',
                'jenis_kelamin' => 'Laki-laki',
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'nomor_identitas' => '9876543210987654',
                'alamat' => 'Jl. Ahmad Yani No. 20, Bandung',
                'no_telepon' => '08234567890',
                'email' => 'siti@example.com',
                'tanggal_lahir' => '1992-08-20',
                'jenis_kelamin' => 'Perempuan',
            ],
            [
                'nama' => 'Andi Wijaya',
                'nomor_identitas' => '5555666677778888',
                'alamat' => 'Jl. Sultan Agung No. 15, Surabaya',
                'no_telepon' => '08345678901',
                'email' => 'andi@example.com',
                'tanggal_lahir' => '1988-03-10',
                'jenis_kelamin' => 'Laki-laki',
            ],
        ];

        foreach ($pasiens as $pasien) {
            Pasien::create($pasien);
        }

        // Create sample Dokters
        $dokters = [
            [
                'nama' => 'Dr. Ahmad Ramadhani',
                'spesialisasi' => 'Umum',
                'nomor_lisensi' => 'DRG001/2024',
                'no_telepon' => '08556789012',
                'email' => 'ahmad.dokter@example.com',
                'alamat' => 'Jl. Dokter No. 5, Jakarta',
            ],
            [
                'nama' => 'Dr. Sari Wulandari',
                'spesialisasi' => 'Pediatri',
                'nomor_lisensi' => 'DRG002/2024',
                'no_telepon' => '08667890123',
                'email' => 'sari.dokter@example.com',
                'alamat' => 'Jl. Kesehatan No. 8, Bandung',
            ],
            [
                'nama' => 'Dr. Hendra Gunawan',
                'spesialisasi' => 'Kardiologi',
                'nomor_lisensi' => 'DRG003/2024',
                'no_telepon' => '08778901234',
                'email' => 'hendra.dokter@example.com',
                'alamat' => 'Jl. Medis No. 12, Surabaya',
            ],
        ];

        foreach ($dokters as $dokter) {
            Dokter::create($dokter);
        }

        // Create sample Obats
        $obats = [
            [
                'nama' => 'Paracetamol 500mg',
                'dosis' => '1-2 tablet, 3x sehari',
                'harga' => 2500,
                'stok' => 100,
                'kategori' => 'Analgesik',
                'keterangan' => 'Obat penurun panas dan penghilang nyeri',
            ],
            [
                'nama' => 'Amoxicillin 500mg',
                'dosis' => '1 kapsul, 3x sehari',
                'harga' => 5000,
                'stok' => 50,
                'kategori' => 'Antibiotik',
                'keterangan' => 'Obat antibiotik untuk infeksi bakteri',
            ],
            [
                'nama' => 'Vitamin C 1000mg',
                'dosis' => '1 tablet sehari',
                'harga' => 3000,
                'stok' => 200,
                'kategori' => 'Vitamin',
                'keterangan' => 'Suplemen vitamin C untuk daya tahan tubuh',
            ],
            [
                'nama' => 'Metformin 500mg',
                'dosis' => '1 tablet, 2-3x sehari',
                'harga' => 4500,
                'stok' => 80,
                'kategori' => 'Antidiabetik',
                'keterangan' => 'Obat untuk mengelola diabetes tipe 2',
            ],
        ];

        foreach ($obats as $obat) {
            Obat::create($obat);
        }

        // Create sample Rekam Medis
        $pasienIds = Pasien::pluck('id')->toArray();
        $dokterIds = Dokter::pluck('id')->toArray();
        $obatIds = Obat::pluck('id')->toArray();

        $rekamMedis = [
            [
                'pasien_id' => $pasienIds[0] ?? 1,
                'dokter_id' => $dokterIds[0] ?? 1,
                'tanggal_kunjungan' => now()->format('Y-m-d'),
                'keluhan' => 'Demam tinggi dan batuk',
                'diagnosa' => 'Infeksi saluran pernapasan',
                'biaya' => 150000,
                'resep' => 'Paracetamol, Amoxicillin, Vitamin C',
            ],
        ];

        foreach ($rekamMedis as $rm) {
            do {
                $kode = 'RM-' . strtoupper(Str::random(8));
            } while (RekamMedis::where('kode', $kode)->exists());

            $rm['kode'] = $kode;
            RekamMedis::create($rm);
        }
    }
}
