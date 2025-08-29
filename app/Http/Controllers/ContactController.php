<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // tampilkan halaman contact
    public function index()
    {
        return view('pages.contact');
    }

    // proses form contact
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ]);

        return back()->with('success', 'Pesan kamu sudah terkirim!');
    }

    // contact dinamis pakai region & city
    public function show($region, $city = null)
    {
        return view('pages.contact', [
            'region' => $region,
            'city'   => $city,
        ]);
    }
}
