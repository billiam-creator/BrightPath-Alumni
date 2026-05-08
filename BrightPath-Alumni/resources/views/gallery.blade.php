@extends('layout.frontend')

@section('content')
<div class="py-5">
    <div class="container text-center mb-5">
        <span class="badge mb-2 px-3 py-2" style="background:#dcfce7;color:#16a34a;border-radius:99px;">Photo Gallery</span>
        <h1 class="display-5 fw-bold mb-2">Alumni Memories</h1>
        <p class="lead text-muted">Moments that define our shared BrightPath journey.</p>
    </div>

    <div class="container">
        @if($images->count())
            <div class="row g-3">
                @foreach($images as $image)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="fade-in" style="overflow:hidden;border-radius:1rem;box-shadow:0 2px 8px rgba(0,0,0,0.1);transition:transform 0.3s;"
                             onmouseover="this.style.transform='translateY(-4px)'"
                             onmouseout="this.style.transform='translateY(0)'">
                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                 alt="{{ $image->caption ?? 'Gallery photo' }}"
                                 style="width:100%;height:220px;object-fit:cover;display:block;">
                            @if($image->caption)
                                <div style="background:white;padding:0.75rem 1rem;">
                                    <p class="mb-0 small text-muted">{{ $image->caption }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <div class="fs-1 mb-3">🖼️</div>
                <h4 class="text-muted fw-semibold">No Photos Yet</h4>
                <p class="text-muted small">Check back soon for alumni photos and event memories.</p>
            </div>
        @endif
    </div>
</div>
@endsection
