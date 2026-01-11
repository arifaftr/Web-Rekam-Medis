<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of pasien
     */
    public function index(Request $request)
    {
        $search = $request->query('q');

        $pasiens = Pasien::query()
            ->latest()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('nomor_identitas', 'like', "%{$search}%")
                        ->orWhere('no_telepon', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->paginate(15)
            ->withQueryString();

        return view('pasien.index', compact('pasiens', 'search'));
    }

    /**
     * Show the form for creating a new pasien
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created pasien in database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_identitas' => 'required|string|unique:pasiens,nomor_identitas|max:20',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'email' => 'nullable|email|unique:pasiens,email',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
        ]);

        Pasien::create($validated);

        return redirect()->route('pasien.index')
            ->with('success', 'Data pasien berhasil ditambahkan');
    }

    /**
     * Display the specified pasien
     */
    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified pasien
     */
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified pasien in database
     */
    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_identitas' => 'required|string|max:20|unique:pasiens,nomor_identitas,' . $id,
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'email' => 'nullable|email|unique:pasiens,email,' . $id,
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
        ]);

        $pasien->update($validated);

        return redirect()->route('pasien.index')
            ->with('success', 'Data pasien berhasil diperbarui');
    }

    /**
     * Remove the specified pasien from database
     */
    public function destroy($id)
    {
        Pasien::findOrFail($id)->delete();
        return redirect()->route('pasien.index')
            ->with('success', 'Data pasien berhasil dihapus');
    }
}
