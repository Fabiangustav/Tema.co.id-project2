<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        return view('ShowBlog', compact('blog'));
    }
}
