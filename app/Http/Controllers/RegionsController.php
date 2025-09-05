<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionsController extends Controller
{
    // Tampilkan daftar region (untuk admin)
    public function index()
    {
        // Ambil semua region + hitung jumlah cities
        $regions = Region::withCount('cities')->paginate(10);

        return view('admin.regions.index', compact('regions'));
    }

    // Form tambah region baru
    public function create()
    {
        return view('admin.regions.create');
    }

    // Simpan data region baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'nama kota' => 'required|string|max:10|unique:regions,code',
        ]);

        Region::create([
            'name'      => $request->name,
            'nama kota'      => $request->code,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.regions.index')->with('success', 'Region berhasil ditambahkan');
    }

    // Form edit region
    public function edit(Region $region)
    {
        return view('admin.regions.edit', compact('region'));
    }

    // Update data region
    public function update(Request $request, Region $region)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'nama kota' => 'required|string|max:10|unique:regions,code,' . $region->id,
        ]);

        $region->update([
            'name'      => $request->name,
            'nama kota'      => $request->code,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.regions.index')->with('success', 'Region berhasil diperbarui');
    }

    // Hapus data region
    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('admin.regions.index')->with('success', 'Region berhasil dihapus');
    }

    // Toggle status aktif/inaktif (AJAX)
    public function toggleStatus(Request $request, Region $region)
    {
        $region->is_active = $request->input('is_active', false);
        $region->save();

        return response()->json(['success' => true]);
    }
}
