@extends('layout.frontend')

@section('content')
<div class="py-5">
    <!-- Header -->
    <div class="container text-center mb-5">
        <span class="badge mb-2 px-3 py-2" style="background:#dbeafe;color:#1d4ed8;border-radius:99px;">Our Community</span>
        <h1 class="display-5 fw-bold mb-2">Meet Our Alumni</h1>
        <p class="lead text-muted">Outstanding graduates who represent the BrightPath legacy.</p>
    </div>

    <div class="container">
        @if($members->count())
            <div class="row g-4 justify-content-center">
                @foreach($members as $member)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card border-0 shadow-sm text-center h-100 fade-in"
                             style="border-radius:1.25rem;padding:2rem 1.5rem;">
                            @if($member->photo)
                                <img src="{{ asset('storage/' . $member->photo) }}"
                                     alt="{{ $member->name }}"
                                     class="rounded-circle mx-auto mb-3"
                                     style="width:100px;height:100px;object-fit:cover;border:3px solid #dbeafe;">
                            @else
                                <div class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                     style="width:100px;height:100px;background:linear-gradient(135deg,#667eea,#764ba2);color:white;font-size:2rem;">
                                    {{ strtoupper(substr($member->name, 0, 1)) }}
                                </div>
                            @endif
                            <h5 class="fw-bold mb-1" style="color:#1e293b;">{{ $member->name }}</h5>
                            @if($member->role)
                                <p class="small fw-medium mb-0" style="color:#2563eb;">{{ $member->role }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <div class="fs-1 mb-3">👥</div>
                <h4 class="text-muted fw-semibold">No Members Listed Yet</h4>
                <p class="text-muted small">We're building our amazing team. Check back soon!</p>
            </div>
        @endif
    </div>
</div>
@endsection
