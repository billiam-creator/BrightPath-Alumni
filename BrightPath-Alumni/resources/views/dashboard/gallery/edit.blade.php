@extends('dashboard.layout')
@section('title', 'Edit Photo')

@section('content')
<div class="page-header">
    <h1>Edit Photo</h1>
    <p><a href="{{ route('dashboard.gallery.index') }}" style="color:#4f46e5;text-decoration:none;">← Back to Gallery</a></p>
</div>

@if ($errors->any())
    <div class="alert-error">
        <ul class="mb-0 ps-3">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<div class="dash-card" style="max-width:540px;">
    <form action="{{ route('dashboard.gallery.update', $gallery->id) }}" method="POST"
          enctype="multipart/form-data" class="dash-form">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Current Image</label>
            <img src="{{ asset('storage/' . $gallery->image_path) }}"
                 style="width:100%;max-height:200px;object-fit:cover;border-radius:0.625rem;display:block;margin-top:0.4rem;">
        </div>
        <div class="form-group">
            <label>Replace Image <span style="color:#94a3b8;font-weight:400;">(optional)</span></label>
            <input type="file" name="image" accept="image/*">
            <p style="font-size:0.75rem;color:#94a3b8;margin-top:0.3rem;">Leave blank to keep current image</p>
        </div>
        <div class="form-group">
            <label>Caption</label>
            <input type="text" name="caption" value="{{ old('caption', $gallery->caption) }}"
                   placeholder="Describe this photo...">
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn-add">
                <i class="fa fa-save"></i> Update
            </button>
            <a href="{{ route('dashboard.gallery.index') }}"
               style="padding:0.55rem 1rem;border-radius:0.625rem;background:#f1f5f9;color:#475569;text-decoration:none;font-size:0.875rem;font-weight:500;">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
