@extends('layout.frontend')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Image Left -->
            <div class="col-md-6">
                <img src="{{ asset('storage/images/alumni1.jpg') }}" alt="BrightPath Alumni" class="img-fluid rounded shadow-sm" style="max-height: 500px; object-fit: cover; width: 100%;">
            </div>

            <!-- Text Right -->
            <div class="col-md-6">
                <h2 class="fw-bold text-primary mb-4">About BrightPath Alumni</h2>
                <p class="text-muted mb-4">
                    BrightPath Alumni is more than just a network—it's a lifelong bond that connects past students of BrightPath International School.
                    Our community thrives on shared memories, lasting friendships, and a passion for giving back.
                </p>
                <p class="text-muted mb-4">
                    Since our first graduating class, our alumni have gone on to become leaders, innovators, and changemakers across the globe.
                    The alumni association was formed to keep those connections strong—through events, mentorship, and ongoing collaboration.
                </p>
                <h5 class="text-dark fw-semibold">Our Purpose</h5>
                <ul class="list-unstyled text-muted">
                    <li>✔ Reconnect with fellow classmates and staff</li>
                    <li>✔ Provide mentorship and guidance to current students</li>
                    <li>✔ Host reunions, seminars, and networking events</li>
                    <li>✔ Celebrate our shared journey beyond the classroom</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
