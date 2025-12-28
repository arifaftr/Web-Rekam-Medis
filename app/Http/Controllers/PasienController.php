<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // READ ALL
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien.index', compact('pasiens'));
    }

    // SHOW CREATE FORM
    public function create()
    {
        return view('pasien.create');
    }

    // CREATE
    public function store(Request $request)
    {
        $pasien = Pasien::create($request->all());
        return redirect('/pasien')->with('success', 'Data pasien berhasil ditambahkan');
    }

    // READ DETAIL
    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.show', compact('pasien'));
    }

    // SHOW EDIT FORM
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());
        return redirect('/pasien')->with('success', 'Data pasien berhasil diperbarui');
    }

    // DELETE
    public function destroy($id)
    {
        Pasien::findOrFail($id)->delete();
        return redirect('/pasien')->with('success', 'Data pasien berhasil dihapus');
    }
}
