<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Tampilkan semua blog.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Form tambah blog baru.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Simpan blog baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'status'  => 'required|in:draft,published',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $blog = new Blog();
        $blog->title   = $request->title;
        $blog->slug    = Str::slug($request->title);
        $blog->content = $request->content;
        $blog->status  = $request->status;

        // Upload image kalau ada
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/blogs', 'public');
            $blog->image = $path;
        }

        $blog->save();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog berhasil ditambahkan');
    }

    /**
     * Detail blog.
     */
/*    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Form edit blog.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update blog.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'status'  => 'required|in:draft,published',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title   = $request->title;
        $blog->slug    = Str::slug($request->title);
        $blog->content = $request->content; 
        $blog->status  = $request->status;

        // Update image kalau ada upload baru
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/blogs', 'public');
            $blog->image = $path;
        }

        $blog->save();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog berhasil diperbarui');
    }

    /**
     * Hapus blog.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog berhasil dihapus');
    }
}
