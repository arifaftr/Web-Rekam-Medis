<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of obat
     */
    public function index(Request $request)
    {
        $search = $request->query('q');

        $obats = Obat::query()
            ->latest()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('dosis', 'like', "%{$search}%")
                        ->orWhere('kategori', 'like', "%{$search}%");
                });
            })
            ->paginate(15)
            ->withQueryString();

        return view('obat.index', compact('obats', 'search'));
    }

    /**
     * Show the form for creating a new obat
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created obat in database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'dosis' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'kategori' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        Obat::create($validated);

        return redirect()->route('obat.index')
            ->with('success', 'Data obat berhasil ditambahkan');
    }

    /**
     * Display the specified obat
     */
    public function show($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.show', compact('obat'));
    }

    /**
     * Show the form for editing the specified obat
     */
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.edit', compact('obat'));
    }

    /**
     * Update the specified obat in database
     */
    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'dosis' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'kategori' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        $obat->update($validated);

        return redirect()->route('obat.index')
            ->with('success', 'Data obat berhasil diperbarui');
    }

    /**
     * Remove the specified obat from database
     */
    public function destroy($id)
    {
        Obat::findOrFail($id)->delete();
        return redirect()->route('obat.index')
            ->with('success', 'Data obat berhasil dihapus');
    }
}
