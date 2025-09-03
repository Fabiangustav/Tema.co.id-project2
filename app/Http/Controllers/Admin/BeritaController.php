<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // Tampilkan semua berita
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    // Form tambah berita
    public function create()
    {
        return view('admin.berita.create');
    }

    // Simpan berita baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status'  => 'required|in:draft,published'
        ]);

        // upload gambar
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('berita', 'public');
        }

        // generate slug unik
        $validated['slug'] = Str::slug($validated['title']);
        $originalSlug = $validated['slug'];
        $counter = 1;
        while (Berita::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        Berita::create($validated);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dibuat');
    }

    // Form edit berita
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    // Update berita
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status'  => 'required|in:draft,published',
        ]);

        // cek upload gambar baru
        if ($request->hasFile('image')) {
            // hapus gambar lama
            if ($berita->image && Storage::disk('public')->exists($berita->image)) {
                Storage::disk('public')->delete($berita->image);
            }
            $validated['image'] = $request->file('image')->store('berita', 'public');
        }

        // update slug unik
        $validated['slug'] = Str::slug($validated['title']);
        $originalSlug = $validated['slug'];
        $counter = 1;
        while (Berita::where('slug', $validated['slug'])
                ->where('id', '!=', $berita->id)
                ->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        $berita->update($validated);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    // Hapus berita
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // hapus gambar dari storage
        if ($berita->image && Storage::disk('public')->exists($berita->image)) {
            Storage::disk('public')->delete($berita->image);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}
