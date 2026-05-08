@extends('dashboard.layout')
@section('title', 'Upload Photo')

@section('content')
<div class="page-header">
    <h1>Upload Photo</h1>
    <p><a href="{{ route('dashboard.gallery.index') }}" style="color:#4f46e5;text-decoration:none;">← Back to Gallery</a></p>
</div>

@if ($errors->any())
    <div class="alert-error">
        <ul class="mb-0 ps-3">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<div class="dash-card" style="max-width:540px;">
    <form action="{{ route('dashboard.gallery.store') }}" method="POST"
          enctype="multipart/form-data" class="dash-form">
        @csrf
        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="image" accept="image/*" required>
            <p style="font-size:0.75rem;color:#94a3b8;margin-top:0.3rem;">JPG, PNG or GIF · Max 4MB</p>
        </div>
        <div class="form-group">
            <label>Caption <span style="color:#94a3b8;font-weight:400;">(optional)</span></label>
            <input type="text" name="caption" value="{{ old('caption') }}"
                   placeholder="Describe this photo...">
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn-add">
                <i class="fa fa-upload"></i> Upload
            </button>
            <a href="{{ route('dashboard.gallery.index') }}"
               style="padding:0.55rem 1rem;border-radius:0.625rem;background:#f1f5f9;color:#475569;text-decoration:none;font-size:0.875rem;font-weight:500;">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
