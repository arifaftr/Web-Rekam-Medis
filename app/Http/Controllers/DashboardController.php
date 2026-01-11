<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Obat;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with statistics
     */
    public function index(Request $request)
    {
        $countPasien = Pasien::count();
        $countDokter = Dokter::count();
        $countObat = Obat::count();
        $countRekam = RekamMedis::count();

        $recent = RekamMedis::with(['pasien', 'dokter'])
            ->orderByDesc('tanggal_kunjungan')
            ->take(5)
            ->get();

        return view('dashboard', compact('countPasien', 'countDokter', 'countObat', 'countRekam', 'recent'));
    }
}
