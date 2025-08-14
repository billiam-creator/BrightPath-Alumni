<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $events = Event::orderBy('date', 'desc')->get();
        return view('events', compact('events'));
    }
    
    // This is the new method for the 'Join Event' button.
    public function join(Event $event)
    {
        // Here you would add the logic to register a user for an event.
        // For example, you might create a new entry in a 'registrations' table.
        // After processing, you would redirect the user with a success message.
        
        // Example: Assume you have an 'attendees' relationship on your Event model.
        // $event->attendees()->attach(auth()->id());
        
        return redirect()->route('frontend.events.index')->with('success', 'You have successfully joined the event!');
    }

    // This is the new method for the 'Donate' button.
    public function donate(Event $event)
    {
        // Here you would add the logic for a donation process.
        // This might involve redirecting to a payment gateway or
        // displaying a donation form specific to the event.
        
        // For now, let's just redirect with a message.
        return redirect()->route('frontend.events.index')->with('success', 'Thank you for your interest in donating to this event!');
    }
}