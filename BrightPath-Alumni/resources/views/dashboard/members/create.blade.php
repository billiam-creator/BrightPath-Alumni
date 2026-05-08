@extends('dashboard.layout')
@section('title', 'Add Member')

@section('content')
<div class="page-header">
    <h1>Add Member</h1>
    <p><a href="{{ route('dashboard.members.index') }}" style="color:#4f46e5;text-decoration:none;">← Back to Members</a></p>
</div>

@if ($errors->any())
    <div class="alert-error">
        <ul class="mb-0 ps-3">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<div class="dash-card" style="max-width:560px;">
    <form action="{{ route('dashboard.members.store') }}" method="POST"
          enctype="multipart/form-data" class="dash-form">
        @csrf
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Jane Wanjiku" required>
        </div>
        <div class="form-group">
            <label>Role / Title</label>
            <input type="text" name="role" value="{{ old('role') }}" placeholder="e.g. Class of 2012, Software Engineer">
        </div>
        <div class="form-group">
            <label>Profile Photo</label>
            <input type="file" name="photo" accept="image/*">
            <p style="font-size:0.75rem;color:#94a3b8;margin-top:0.3rem;">JPG, PNG or GIF · Max 2MB</p>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn-add">
                <i class="fa fa-save"></i> Save Member
            </button>
            <a href="{{ route('dashboard.members.index') }}"
               style="padding:0.55rem 1rem;border-radius:0.625rem;background:#f1f5f9;color:#475569;text-decoration:none;font-size:0.875rem;font-weight:500;">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
