<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::first();
        if (!$about) {
            $about = new About();
        }
        $about->content = $request->content;
        $about->save();

        return redirect()->route('admin.dashboard')->with('success', 'Tentang Kami berhasil diperbarui');
    }
}
