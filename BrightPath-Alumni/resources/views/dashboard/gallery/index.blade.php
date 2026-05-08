@extends('dashboard.layout')
@section('title', 'Gallery')

@section('content')
<div class="page-header d-flex justify-content-between align-items-start">
    <div>
        <h1>Gallery</h1>
        <p>Manage alumni photo gallery</p>
    </div>
    <a href="{{ route('dashboard.gallery.create') }}" class="btn-add">
        <i class="fa fa-plus"></i> Upload Photo
    </a>
</div>

@if(session('success'))
    <div class="alert-success"><i class="fa fa-check-circle"></i> {{ session('success') }}</div>
@endif

@if($images->count())
    <div class="row g-3">
        @foreach ($images as $image)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="dash-card p-0 overflow-hidden" style="transition:transform 0.2s;">
                    <img src="{{ asset('storage/' . $image->image_path) }}"
                         alt="{{ $image->caption ?? 'Gallery image' }}"
                         style="width:100%;height:180px;object-fit:cover;display:block;">
                    <div style="padding:0.875rem;">
                        @if($image->caption)
                            <p style="font-size:0.825rem;color:#374151;margin:0 0 0.75rem;">{{ $image->caption }}</p>
                        @else
                            <p style="font-size:0.8rem;color:#94a3b8;margin:0 0 0.75rem;font-style:italic;">No caption</p>
                        @endif
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('dashboard.gallery.edit', $image->id) }}" class="btn-edit">
                                <i class="fa fa-pen me-1"></i>Edit
                            </a>
                            <form action="{{ route('dashboard.gallery.destroy', $image->id) }}" method="POST"
                                  onsubmit="return confirm('Delete this image?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-delete">
                                    <i class="fa fa-trash me-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="dash-card text-center py-5" style="color:#94a3b8;">
        <i class="fa fa-images fa-3x mb-3 d-block"></i>
        <p>No photos uploaded yet.</p>
        <a href="{{ route('dashboard.gallery.create') }}" class="btn-add d-inline-flex">
            <i class="fa fa-upload"></i> Upload First Photo
        </a>
    </div>
@endif
@endsection
