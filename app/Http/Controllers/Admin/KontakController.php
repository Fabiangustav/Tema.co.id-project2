<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Kontak; // pastikan sudah ada model Kontak

class KontakController extends Controller
{
    /**
     * Display a listing of contacts.
     */
    public function index()
    {
        // Ambil data dari database dengan pagination
        $contacts = Kontak::latest()->paginate(10);

        $totalMessages = $contacts->total(); // total semua pesan
        $newMessages   = Kontak::where('is_read', false)->count(); // pesan belum dibaca

        return view('admin.kontak.index', compact('contacts', 'totalMessages', 'newMessages'));
    }

    /**
     * Show the form for creating a new contact.
     */
    public function create()
    {
        return view('admin.kontak.create');
    }

    /**
     * Store a newly created contact in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Simpan ke database
        Kontak::create($request->all());

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Contact message sent successfully!');
    }

    /**
     * Display the specified contact.
     */
    public function show($id)
    {
        $contact = Kontak::findOrFail($id);
        return view('admin.kontak.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified contact.
     */
    public function edit($id)
    {
        $contact = Kontak::findOrFail($id);
        return view('admin.kontak.edit', compact('contact'));
    }

    /**
     * Update the specified contact in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'phone'    => 'nullable|string|max:20',
            'subject'  => 'required|string|max:255',
            'message'  => 'required|string',
            'region'   => 'nullable|string|max:100',
            'priority' => 'nullable|in:normal,high,urgent',
            'is_read'  => 'boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $contact = Kontak::findOrFail($id);

        // Jika tombol "mark_as_read" ditekan
        if ($request->has('mark_as_read')) {
            $contact->update(['is_read' => true]);
            return redirect()->route('admin.kontak.index')
                ->with('success', 'Message marked as read!');
        }

        // Update data di database
        $contact->update($request->all());

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Contact message updated successfully!');
    }

    /**
     * Remove the specified contact from storage.
     */
    public function destroy($id)
    {
        $contact = Kontak::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Contact deleted successfully!');
    }
}
