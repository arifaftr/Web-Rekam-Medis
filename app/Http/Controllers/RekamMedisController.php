<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of rekam medis
     */
    public function index(Request $request)
    {
        $search = $request->query('q');

        $rekamMedis = RekamMedis::with(['pasien', 'dokter', 'obats'])
            ->latest()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('kode', 'like', "%{$search}%")
                        ->orWhere('diagnosa', 'like', "%{$search}%")
                        ->orWhere('keluhan', 'like', "%{$search}%")
                        ->orWhereHas('pasien', function ($pasienQuery) use ($search) {
                            $pasienQuery->where('nama', 'like', "%{$search}%");
                        })
                        ->orWhereHas('dokter', function ($dokterQuery) use ($search) {
                            $dokterQuery->where('nama', 'like', "%{$search}%");
                        });
                });
            })
            ->paginate(15)
            ->withQueryString();

        return view('rekam-medis.index', compact('rekamMedis', 'search'));
    }

    /**
     * Show the form for creating a new rekam medis
     */
    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        $obats = Obat::where('stok', '>', 0)->get();
        return view('rekam-medis.create', compact('pasiens', 'dokters', 'obats'));
    }

    /**
     * Store a newly created rekam medis in database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_kunjungan' => 'required|date',
            'keluhan' => 'required|string',
            'diagnosa' => 'required|string',
            'biaya' => 'required|numeric|min:0',
            'obat_ids' => 'nullable|array',
            'obat_ids.*' => 'exists:obats,id',
        ]);

        // Generate unique kode
        do {
            $kode = 'RM-' . strtoupper(Str::random(8));
        } while (RekamMedis::where('kode', $kode)->exists());

        $validated['kode'] = $kode;
        $rekamMedis = RekamMedis::create($validated);

        // Sync obat relations if provided
        $obatIds = $request->input('obat_ids', []);
        if (is_array($obatIds) && count($obatIds)) {
            $rekamMedis->obats()->sync($obatIds);
            $names = Obat::whereIn('id', $obatIds)->pluck('nama')->toArray();
            $rekamMedis->resep = implode(', ', $names);
            $rekamMedis->save();
        }

        return redirect()->route('rekam-medis.index')
            ->with('success', 'Rekam medis berhasil ditambahkan');
    }

    /**
     * Display the specified rekam medis
     */
    public function show($id)
    {
        $rekamMedis = RekamMedis::with(['pasien', 'dokter', 'obats'])->findOrFail($id);
        return view('rekam-medis.show', compact('rekamMedis'));
    }

    /**
     * Show the form for editing the specified rekam medis
     */
    public function edit($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        
        // Show obat that have stock, but keep any obat already attached to this rekam medis
        $selected = $rekamMedis->obats()->pluck('obats.id')->toArray();
        $availableQuery = Obat::where('stok', '>', 0);
        if (!empty($selected)) {
            $obats = $availableQuery->orWhereIn('id', $selected)->get();
        } else {
            $obats = $availableQuery->get();
        }
        
        return view('rekam-medis.edit', compact('rekamMedis', 'pasiens', 'dokters', 'obats', 'selected'));
    }

    /**
     * Update the specified rekam medis in database
     */
    public function update(Request $request, $id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);

        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_kunjungan' => 'required|date',
            'keluhan' => 'required|string',
            'diagnosa' => 'required|string',
            'biaya' => 'required|numeric|min:0',
            'obat_ids' => 'nullable|array',
            'obat_ids.*' => 'exists:obats,id',
        ]);

        $rekamMedis->update($validated);

        // Sync obat relations if provided
        $obatIds = $request->input('obat_ids', []);
        if (is_array($obatIds)) {
            $rekamMedis->obats()->sync($obatIds);
            $names = Obat::whereIn('id', $obatIds)->pluck('nama')->toArray();
            $rekamMedis->resep = implode(', ', $names);
            $rekamMedis->save();
        }

        return redirect()->route('rekam-medis.index')
            ->with('success', 'Rekam medis berhasil diperbarui');
    }

    /**
     * Remove the specified rekam medis from database
     */
    public function destroy($id)
    {
        RekamMedis::findOrFail($id)->delete();
        return redirect()->route('rekam-medis.index')
            ->with('success', 'Rekam medis berhasil dihapus');
    }
}

