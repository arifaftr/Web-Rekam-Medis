<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of dokter
     */
    public function index(Request $request)
    {
        $search = $request->query('q');

        $dokters = Dokter::query()
            ->latest()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('spesialisasi', 'like', "%{$search}%")
                        ->orWhere('nomor_lisensi', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->paginate(15)
            ->withQueryString();

        return view('dokter.index', compact('dokters', 'search'));
    }

    /**
     * Show the form for creating a new dokter
     */
    public function create()
    {
        return view('dokter.create');
    }

    /**
     * Store a newly created dokter in database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:100',
            'nomor_lisensi' => 'required|string|unique:dokters,nomor_lisensi|max:50',
            'no_telepon' => 'required|string|max:20',
            'email' => 'required|email|unique:dokters,email',
            'alamat' => 'required|string',
        ]);

        Dokter::create($validated);

        return redirect()->route('dokter.index')
            ->with('success', 'Data dokter berhasil ditambahkan');
    }

    /**
     * Display the specified dokter
     */
    public function show($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokter.show', compact('dokter'));
    }

    /**
     * Show the form for editing the specified dokter
     */
    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokter.edit', compact('dokter'));
    }

    /**
     * Update the specified dokter in database
     */
    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:100',
            'nomor_lisensi' => 'required|string|max:50|unique:dokters,nomor_lisensi,' . $id,
            'no_telepon' => 'required|string|max:20',
            'email' => 'required|email|unique:dokters,email,' . $id,
            'alamat' => 'required|string',
        ]);

        $dokter->update($validated);

        return redirect()->route('dokter.index')
            ->with('success', 'Data dokter berhasil diperbarui');
    }

    /**
     * Remove the specified dokter from database
     */
    public function destroy($id)
    {
        Dokter::findOrFail($id)->delete();
        return redirect()->route('dokter.index')
            ->with('success', 'Data dokter berhasil dihapus');
    }
}

