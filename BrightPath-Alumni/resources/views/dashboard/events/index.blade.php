@extends('dashboard.layout')
@section('title', 'Events')

@section('content')
<div class="page-header d-flex justify-content-between align-items-start">
    <div>
        <h1>Events</h1>
        <p>Manage all alumni events</p>
    </div>
    <a href="{{ route('dashboard.events.create') }}" class="btn-add">
        <i class="fa fa-plus"></i> Add Event
    </a>
</div>

@if(session('success'))
    <div class="alert-success"><i class="fa fa-check-circle"></i> {{ session('success') }}</div>
@endif

<div class="dash-card p-0 overflow-hidden">
    <table class="dash-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($events as $event)
                <tr>
                    <td style="font-weight:500;">{{ $event->title }}</td>
                    <td>
                        <span style="background:#ede9fe;color:#7c3aed;padding:0.2rem 0.6rem;border-radius:99px;font-size:0.775rem;font-weight:500;">
                            {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}
                        </span>
                    </td>
                    <td style="max-width:280px;color:#64748b;">{{ Str::limit($event->description, 80) }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('dashboard.events.edit', $event->id) }}" class="btn-edit">
                                <i class="fa fa-pen me-1"></i>Edit
                            </a>
                            <form action="{{ route('dashboard.events.destroy', $event->id) }}" method="POST"
                                  onsubmit="return confirm('Delete this event?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-delete">
                                    <i class="fa fa-trash me-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center;padding:3rem;color:#94a3b8;">
                        <i class="fa fa-calendar-days fa-2x mb-2 d-block"></i>
                        No events yet. <a href="{{ route('dashboard.events.create') }}" style="color:#4f46e5;">Add your first event</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
