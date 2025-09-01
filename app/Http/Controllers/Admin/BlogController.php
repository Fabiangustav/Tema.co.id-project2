<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index');
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        // Logic simpan blog
    }

    public function show($id)
    {
        return view('admin.blog.show');
    }

    public function edit($id)
    {
        return view('admin.blog.edit');
    }

    public function update(Request $request, $id)
    {
        // Logic update blog
    }

    public function destroy($id)
    {
        // Logic hapus blog
    }
}