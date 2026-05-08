@extends('dashboard.layout')

@section('title', 'Dashboard Home')

@section('content')
<div class="page-header">
    <h1>Welcome back, {{ auth()->user()->name }} 👋</h1>
    <p>Here's what's happening with BrightPath Alumni today.</p>
</div>

<div class="row g-4 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#ede9fe; color:#7c3aed;">
                <i class="fa fa-calendar-days"></i>
            </div>
            <div>
                <div class="stat-value">{{ \App\Models\Event::count() }}</div>
                <div class="stat-label">Total Events</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#dbeafe; color:#2563eb;">
                <i class="fa fa-users"></i>
            </div>
            <div>
                <div class="stat-value">{{ \App\Models\Member::count() }}</div>
                <div class="stat-label">Members</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#dcfce7; color:#16a34a;">
                <i class="fa fa-images"></i>
            </div>
            <div>
                <div class="stat-value">{{ \App\Models\Gallery::count() }}</div>
                <div class="stat-label">Gallery Photos</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#fef3c7; color:#d97706;">
                <i class="fa fa-envelope"></i>
            </div>
            <div>
                <div class="stat-value">{{ \App\Models\Contact::count() }}</div>
                <div class="stat-label">Messages</div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="dash-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold m-0" style="color:#1e293b;">Recent Events</h6>
                <a href="{{ route('dashboard.events.index') }}" style="font-size:0.8rem; color:#4f46e5; text-decoration:none;">View all →</a>
            </div>
            @php $recentEvents = \App\Models\Event::orderBy('date','desc')->take(5)->get(); @endphp
            @forelse($recentEvents as $event)
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <div>
                        <div style="font-size:0.875rem; font-weight:500; color:#1e293b;">{{ $event->title }}</div>
                        <div style="font-size:0.775rem; color:#64748b;">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</div>
                    </div>
                    <a href="{{ route('dashboard.events.edit', $event->id) }}" class="btn-edit">Edit</a>
                </div>
            @empty
                <p style="color:#94a3b8; font-size:0.875rem;">No events yet.</p>
            @endforelse
        </div>
    </div>
    <div class="col-lg-6">
        <div class="dash-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold m-0" style="color:#1e293b;">Recent Members</h6>
                <a href="{{ route('dashboard.members.index') }}" style="font-size:0.8rem; color:#4f46e5; text-decoration:none;">View all →</a>
            </div>
            @php $recentMembers = \App\Models\Member::latest()->take(5)->get(); @endphp
            @forelse($recentMembers as $member)
                <div class="d-flex align-items-center gap-3 py-2 border-bottom">
                    @if($member->photo)
                        <img src="{{ asset('storage/' . $member->photo) }}" class="rounded-circle" style="width:32px;height:32px;object-fit:cover;">
                    @else
                        <div style="width:32px;height:32px;border-radius:50%;background:#ede9fe;display:flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;color:#7c3aed;">
                            {{ strtoupper(substr($member->name, 0, 1)) }}
                        </div>
                    @endif
                    <div class="flex-grow-1">
                        <div style="font-size:0.875rem; font-weight:500; color:#1e293b;">{{ $member->name }}</div>
                        <div style="font-size:0.775rem; color:#64748b;">{{ $member->role ?? 'Alumni' }}</div>
                    </div>
                </div>
            @empty
                <p style="color:#94a3b8; font-size:0.875rem;">No members yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
