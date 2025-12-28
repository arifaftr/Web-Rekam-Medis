<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('dokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        $dokter = Dokter::create($request->all());
        return redirect('/dokter')->with('success', 'Data dokter berhasil ditambahkan');
    }

    public function show($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokter.show', compact('dokter'));
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->all());
        return redirect('/dokter')->with('success', 'Data dokter berhasil diperbarui');
    }

    public function destroy($id)
    {
        Dokter::findOrFail($id)->delete();
        return redirect('/dokter')->with('success', 'Data dokter berhasil dihapus');
    }
}

