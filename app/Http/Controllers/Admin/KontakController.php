<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use App\Models\Kontak; // Uncomment when you create the model

class KontakController extends Controller
{
    /**
     * Display a listing of contacts.
     */
    public function index()
    {
        // Get contact messages from database
        // $kontaks = Kontak::latest()->paginate(10);
        
        // For now, return empty collection until you set up the model
        $kontaks = collect();
        $totalMessages = 0;
        $newMessages = 0;
        
        return view('admin.kontak.index', compact('kontaks', 'totalMessages', 'newMessages'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Here you would typically save to database
        // Example: Kontak::create($request->all());

        return redirect()->route('kontak.index')
            ->with('success', 'Contact message sent successfully!');
    }

    /**
     * Display the specified contact.
     */
    public function show($id)
    {
        // Here you would typically fetch from database
        // Example: $kontak = Kontak::findOrFail($id);
        
        return view('admin.kontak.show', compact('id'));
    }

    /**
     * Show the form for editing the specified contact.
     */
    public function edit($id)
    {
        // Here you would typically fetch from database
        // $kontak = Kontak::findOrFail($id);
        
        // For now, create a sample object
        $kontak = (object) [
            'id' => $id,
            'name' => 'Sample Name',
            'email' => 'sample@email.com', 
            'phone' => '081234567890',
            'subject' => 'Sample Subject',
            'message' => 'Sample message content',
            'region' => 'West Java',
            'is_read' => false,
            'priority' => 'normal'
        ];
        
        return view('admin.kontak.edit', compact('kontak', 'id'));
    }

    /**
     * Update the specified contact in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'region' => 'nullable|string|max:100',
            'priority' => 'nullable|in:normal,high,urgent',
            'is_read' => 'boolean',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle mark as read functionality
        if ($request->has('mark_as_read')) {
            // Update only is_read status
            // $kontak = Kontak::findOrFail($id);
            // $kontak->update(['is_read' => true]);
            
            return redirect()->route('kontak.index')
                ->with('success', 'Message marked as read!');
        }

        // Here you would typically update in database
        // Example: 
        // $kontak = Kontak::findOrFail($id);
        // $kontak->update($request->all());

        return redirect()->route('kontak.index')
            ->with('success', 'Contact message updated successfully!');
    }

    /**
     * Remove the specified contact from storage.
     */
    public function destroy($id)
    {
        // Here you would typically delete from database
        // Example:
        // $kontak = Kontak::findOrFail($id);
        // $kontak->delete();

        return redirect()->route('kontak.index')
            ->with('success', 'Contact deleted successfully!');
    }
}