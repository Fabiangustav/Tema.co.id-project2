<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Proses login
    public function login(Request $request)
    {
        
        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // ✅ Gunakan guard 'admin'
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect ke dashboard admin
            return redirect()->route('admin.dashboard.index');
        }
        
        return back()->withErrors([
            'name' => 'Name atau password salah.',
        ])->onlyInput('name');
    }
}