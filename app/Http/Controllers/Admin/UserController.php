<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Validate and store user
        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validate and update user
        return redirect()->route('admin.users.index');
    }

    public function profile()
    {
        return view('admin.users.profile');
    }

    public function updateProfile(Request $request)
    {
        // Validate and update profile
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
