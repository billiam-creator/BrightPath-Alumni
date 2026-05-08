@extends('dashboard.layout')
@section('title', 'Edit Member')

@section('content')
<div class="page-header">
    <h1>Edit Member</h1>
    <p><a href="{{ route('dashboard.members.index') }}" style="color:#4f46e5;text-decoration:none;">← Back to Members</a></p>
</div>

@if ($errors->any())
    <div class="alert-error">
        <ul class="mb-0 ps-3">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<div class="dash-card" style="max-width:560px;">
    <form action="{{ route('dashboard.members.update', $member->id) }}" method="POST"
          enctype="multipart/form-data" class="dash-form">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" value="{{ old('name', $member->name) }}" required>
        </div>
        <div class="form-group">
            <label>Role / Title</label>
            <input type="text" name="role" value="{{ old('role', $member->role) }}">
        </div>
        <div class="form-group">
            @if($member->photo)
                <label>Current Photo</label>
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $member->photo) }}"
                         style="width:80px;height:80px;object-fit:cover;border-radius:50%;border:2px solid #e2e8f0;">
                </div>
            @endif
            <label>{{ $member->photo ? 'Replace Photo' : 'Profile Photo' }}</label>
            <input type="file" name="photo" accept="image/*">
            <p style="font-size:0.75rem;color:#94a3b8;margin-top:0.3rem;">Leave blank to keep existing photo</p>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn-add">
                <i class="fa fa-save"></i> Update Member
            </button>
            <a href="{{ route('dashboard.members.index') }}"
               style="padding:0.55rem 1rem;border-radius:0.625rem;background:#f1f5f9;color:#475569;text-decoration:none;font-size:0.875rem;font-weight:500;">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
