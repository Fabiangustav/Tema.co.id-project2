<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // ✅ Validasi input
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // ✅ Autentikasi pakai 'name'
        if (Auth::attempt([
            'name' => $credentials['name'],
            'password' => $credentials['password'],
        ])) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        // ❌ Login gagal
        return back()->withErrors([
            'name' => 'Nama atau password salah.',
        ])->onlyInput('name');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    // ✅ Override credential field
    public function username()
    {
        return 'name';
    }
}
