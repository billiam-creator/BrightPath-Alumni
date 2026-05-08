<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display the contact form with recent messages.
     * This is now public (no auth middleware).
     */
    public function index()
    {
        // Get recent messages (limit if needed)
        $contacts = Contact::latest()->take(10)->get();

        return view('contact', compact('contacts'));
    }

    /**
     * Store a new contact message.
     */
    public function store(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Save the message
        Contact::create($validated);

        // Redirect with success message
        return redirect()->route('contact.index')->with('success', '✅ Your message has been sent successfully!');
    }
}
