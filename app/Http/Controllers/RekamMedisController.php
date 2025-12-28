<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = RekamMedis::with(['pasien', 'dokter'])->get();
        return view('rekam-medis.index', compact('rekamMedis'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('rekam-medis.create', compact('pasiens', 'dokters'));
    }

    public function store(Request $request)
    {
        $rekamMedis = RekamMedis::create($request->all());
        return redirect('/rekam-medis')->with('success', 'Rekam medis berhasil ditambahkan');
    }

    public function show($id)
    {
        $rekamMedis = RekamMedis::with(['pasien', 'dokter'])->findOrFail($id);
        return view('rekam-medis.show', compact('rekamMedis'));
    }

    public function edit($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('rekam-medis.edit', compact('rekamMedis', 'pasiens', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $rekamMedis->update($request->all());
        return redirect('/rekam-medis')->with('success', 'Rekam medis berhasil diperbarui');
    }

    public function destroy($id)
    {
        RekamMedis::findOrFail($id)->delete();
        return redirect('/rekam-medis')->with('success', 'Rekam medis berhasil dihapus');
    }
}

