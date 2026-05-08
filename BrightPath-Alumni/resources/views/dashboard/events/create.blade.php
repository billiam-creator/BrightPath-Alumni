@extends('dashboard.layout')
@section('title', 'Create Event')

@section('content')
<div class="page-header">
    <h1>Create Event</h1>
    <p><a href="{{ route('dashboard.events.index') }}" style="color:#4f46e5;text-decoration:none;">← Back to Events</a></p>
</div>

@if ($errors->any())
    <div class="alert-error">
        <ul class="mb-0 ps-3">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<div class="dash-card" style="max-width:640px;">
    <form action="{{ route('dashboard.events.store') }}" method="POST" class="dash-form">
        @csrf
        <div class="form-group">
            <label>Event Title</label>
            <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g. Annual Alumni Gala 2025" required>
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" value="{{ old('date') }}" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="5" placeholder="Describe the event...">{{ old('description') }}</textarea>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn-add">
                <i class="fa fa-save"></i> Save Event
            </button>
            <a href="{{ route('dashboard.events.index') }}"
               style="padding:0.55rem 1rem;border-radius:0.625rem;background:#f1f5f9;color:#475569;text-decoration:none;font-size:0.875rem;font-weight:500;">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
