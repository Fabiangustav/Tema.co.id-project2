<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegionsController extends Controller
{
    // Tampilkan daftar region
    public function index()
    {
        return view('regions.index');
    }

    // Form tambah region baru
    public function create()
    {
        return view('regions.create');
    }

    // Simpan data region baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        // Simpan ke database (contoh, jika ada model Region)
        // Region::create([
        //     'name' => $request->name,
        // ]);

        return redirect()->route('regions.index')->with('success', 'Region berhasil ditambahkan');
    }

    // Detail region
    public function show($id)
    {
        // $region = Region::findOrFail($id);
        return view('regions.show', compact('id'));
    }

    // Form edit region
    public function edit($id)
    {
        // $region = Region::findOrFail($id);
        return view('regions.edit', compact('id'));
    }

    // Update data region
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        // $region = Region::findOrFail($id);
        // $region->update([
        //     'name' => $request->name,
        // ]);

        return redirect()->route('regions.index')->with('success', 'Region berhasil diperbarui');
    }

    // Hapus data region
    public function destroy($id)
    {
        // $region = Region::findOrFail($id);
        // $region->delete();

        return redirect()->route('regions.index')->with('success', 'Region berhasil dihapus');
    }
}
