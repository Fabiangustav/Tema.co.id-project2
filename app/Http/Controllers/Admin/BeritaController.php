<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Services\ActivityLogger;
use App\Http\Controllers\Admin\ActivityLogController;


class BeritaController extends Controller
{
    // Tampilkan semua berita
    public function index()
    {
        $beritas = Berita::latest()->paginate(6);
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
        'slug'    => 'required|string|max:255|unique:beritas,slug',
        'content' => 'required',
        'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status'  => 'required|in:draft,published'
    ]);

    if ($request->hasFile('image')) {
        // simpan ke storage/app/public/berita
        $path = $request->file('image')->store('berita', 'public');
        // simpan nama file dengan path relatif
        $validated['image'] = $path;
    }

    // Pastikan slug unik
    $originalSlug = $validated['slug'];
    $counter = 1;
    while (Berita::where('slug', $validated['slug'])->exists()) {
        $validated['slug'] = $originalSlug . '-' . $counter;
        $counter++;
    }

    $berita = Berita::create($validated);

    // ✅ Catat log (pakai $berita->title, bukan $validated->title)
    // catat log
    ActivityLogger::log(
    'Berita Created',
    "Berita '{$berita->title}' berhasil ditambahkan",
    $berita->status
);


    
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
            'slug'    => 'required|string|max:255|unique:beritas,slug,' . $berita->id,
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'  => 'required|in:draft,published',
        ]);

        // Cek upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($berita->image && Storage::disk('public')->exists($berita->image)) {
                Storage::disk('public')->delete($berita->image);
            }
            $validated['image'] = $request->file('image')->store('berita', 'public');
        }

        // Pastikan slug unik (fallback jika validasi gagal)
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

        // Hapus gambar dari storage jika ada
        if ($berita->image && Storage::disk('public')->exists($berita->image)) {
            Storage::disk('public')->delete($berita->image);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }

    // Method untuk generate slug dari AJAX (opsional)
    public function generateSlug(Request $request)
    {
        $title = $request->input('title');
        $slug = Str::slug($title);
        
        $originalSlug = $slug;
        $counter = 1;
        while (Berita::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        
        return response()->json(['slug' => $slug]);
    }

    public function show($slug)
{
    $berita = Berita::where('slug', $slug)->firstOrFail();
    return view('ShowBerita', compact('berita'));
}
}