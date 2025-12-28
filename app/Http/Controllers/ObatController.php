<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('obat.index', compact('obats'));
    }

    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {
        $obat = Obat::create($request->all());
        return redirect('/obat')->with('success', 'Data obat berhasil ditambahkan');
    }

    public function show($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.show', compact('obat'));
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);
        $obat->update($request->all());
        return redirect('/obat')->with('success', 'Data obat berhasil diperbarui');
    }

    public function destroy($id)
    {
        Obat::findOrFail($id)->delete();
        return redirect('/obat')->with('success', 'Data obat berhasil dihapus');
    }
}
