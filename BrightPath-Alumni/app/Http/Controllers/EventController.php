<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // ─── Public Frontend ──────────────────────────────────────────────────────

    public function index()
    {
        $events = Event::orderBy('date', 'desc')->get();
        return view('events', compact('events'));
    }

    public function join(Event $event)
    {
        // TODO: attach auth()->id() to event->attendees() when that table is ready
        return redirect()->route('events.index')
            ->with('success', 'You have successfully joined "' . $event->title . '"!');
    }

    public function donate(Event $event)
    {
        // TODO: redirect to payment gateway for $event
        return redirect()->route('events.index')
            ->with('success', 'Thank you for your interest in donating to "' . $event->title . '"!');
    }

    // ─── Dashboard (auth-protected) ───────────────────────────────────────────

    public function dashboardIndex()
    {
        $events = Event::orderBy('date', 'desc')->get();
        return view('dashboard.events.index', compact('events'));
    }

    public function dashboardCreate()
    {
        return view('dashboard.events.create');
    }

    public function dashboardStore(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'date'        => 'required|date',
            'description' => 'nullable|string|max:2000',
        ]);

        Event::create($request->only('title', 'date', 'description'));

        return redirect()->route('dashboard.events.index')
            ->with('success', 'Event created successfully.');
    }

    public function dashboardEdit($id)
    {
        $event = Event::findOrFail($id);
        return view('dashboard.events.edit', compact('event'));
    }

    public function dashboardUpdate(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'date'        => 'required|date',
            'description' => 'nullable|string|max:2000',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->only('title', 'date', 'description'));

        return redirect()->route('dashboard.events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function dashboardDestroy($id)
    {
        Event::findOrFail($id)->delete();

        return redirect()->route('dashboard.events.index')
            ->with('success', 'Event deleted successfully.');
    }
}
