<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // 🔒 Dashboard: list all events
    public function index()
    {
        $events = Event::latest()->get();
        return view('dashboard.events.index', compact('events'));
    }

    // 🔒 Dashboard: show form to create a new event
    public function create()
    {
        return view('dashboard.events.create');
    }

    // 🔒 Dashboard: store a new event
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        Event::create($request->all());

        return redirect()->route('dashboard.events.index')->with('success', 'Event created successfully.');
    }

    // 🔒 Dashboard: show form to edit an event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('dashboard.events.edit', compact('event'));
    }

    // 🔒 Dashboard: update the event
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('dashboard.events.index')->with('success', 'Event updated successfully.');
    }

    // 🔒 Dashboard: delete an event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('dashboard.events.index')->with('success', 'Event deleted successfully.');
    }

    // 🌐 Frontend: show public list of events
    public function showPublicEvents()
    {
        $events = Event::latest()->get();
        return view('events', compact('events'));
    }
}
