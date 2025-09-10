<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\ActivityLog;


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
    $validated = $request->validate([
        'title'   => 'required|string|max:255',
        'slug'    => 'required|string|max:255|unique:blogs,slug',
        'content' => 'required',
        'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status'  => 'required|in:draft,published'
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('blog', 'public');
        $validated['image'] = $path;
    }

    $originalSlug = $validated['slug'];
    $counter = 1;
    while (Blog::where('slug', $validated['slug'])->exists()) {
        $validated['slug'] = $originalSlug . '-' . $counter;
        $counter++;
    }

    $blog = Blog::create($validated);

    // ✅ log activity di sini
    ActivityLog::create([
        'title' => 'Blog baru ditambahkan',
        'description' => $blog->title,
        'type' => 'success',
        'user' => auth()->user()->name ?? 'System'
    ]);

    $blog->save();

ActivityLog::create([
    'title' => 'Blog diperbarui',
    'description' => $blog->title,
    'type' => 'primary',
    'user' => auth()->user()->name ?? 'System'
]);

return redirect()->route('admin.blog.index')
    ->with('success', 'Blog berhasil diperbarui');


    $title = $blog->title;
$blog->delete();

ActivityLog::create([
    'title' => 'Blog dihapus',
    'description' => $title,
    'type' => 'danger',
    'user' => auth()->user()->name ?? 'System'
]);

return redirect()->route('admin.blog.index')
    ->with('success', 'Blog berhasil dihapus');

    return redirect()->route('admin.blog.index')
        ->with('success', 'Blog berhasil dibuat');
}


    /**
     * Detail blog berdasarkan slug.
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('ShowBlog', compact('blog'));
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

     ActivityLog::create([
    'title' => 'Blog diupdate',
    'description' => $request->title,
    'type' => 'primary',
    'user' => auth()->user()->name ?? 'System'
]);

    }
}

