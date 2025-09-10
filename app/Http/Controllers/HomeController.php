<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Blog;

class HomeController extends Controller
{
    // Menampilkan daftar berita + blog di halaman utama
    public function index()
    {
        $beritas = Berita::where('status', 'published')
                         ->whereNotNull('image')
                         ->latest()
                         ->get();

        $blogs = Blog::where('status', 'published')
                     ->whereNotNull('image')
                     ->latest()
                     ->get();

        return view('home', compact('beritas', 'blogs'));
    }

    // Menampilkan berita terbaru di halaman ShowBerita (detail berita)
    public function show()
    {
        $berita = Berita::where('status', 'published')
                        ->whereNotNull('image')
                        ->latest()
                        ->first();

        if (!$berita) {
            abort(404, 'Berita tidak ditemukan');
        }

        return view('ShowBerita', compact('berita'));
    }
}
