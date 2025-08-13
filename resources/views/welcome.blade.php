@extends('layout.frontend')

@section('content')

<!-- Add Animate.css to layout.frontend if not already -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> -->

<!-- HERO SECTION WITH COLOR BACKGROUND -->
<section class="hero-banner text-white d-flex align-items-center" style="
    background-color: #004080;
    height: 90vh;
    position: relative;
">
    <div class="container position-relative text-center">
        <h1 class="display-3 fw-bold animate__animated animate__fadeInDown">Welcome to <span class="text-warning">BrightPath Alumni</span></h1>
        <h4 class="mt-4 text-light" id="typed-text"></h4>
        <a href="#services" class="btn btn-warning btn-lg mt-4 animate__animated animate__fadeInUp animate__delay-1s">Explore Alumni Services</a>
    </div>
</section>

<!-- SERVICES SECTION -->
<section id="services" class="py-5 bg-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Alumni Services</h2>
        <p class="text-muted mb-5">Empowering connections beyond graduation</p>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="border p-4 h-100 shadow-sm rounded">
                    <h4 class="text-primary mb-3">🎓 Mentorship</h4>
                    <p>Support current students and fellow alumni through career guidance and mentorship.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border p-4 h-100 shadow-sm rounded">
                    <h4 class="text-primary mb-3">🤝 Networking</h4>
                    <p>Connect with alumni from different years and industries across the globe.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border p-4 h-100 shadow-sm rounded">
                    <h4 class="text-primary mb-3">📅 Events & Reunions</h4>
                    <p>Participate in memorable events that bring BrightPath graduates together.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-5">Alumni Voices</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="bg-white p-4 rounded shadow-sm">
                    <p class="fst-italic">“BrightPath shaped who I am today. The alumni network opened doors I never imagined.”</p>
                    <h6 class="mt-3 text-primary">— Esther N., Class of 2011</h6>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-white p-4 rounded shadow-sm">
                    <p class="fst-italic">“I reconnected with old friends and mentors through the alumni site. It's more than a network—it's a family.”</p>
                    <h6 class="mt-3 text-primary">— Brian K., Class of 2015</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Typed.js Script -->
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Typed('#typed-text', {
            strings: [
                "Celebrating our journey.",
                "Empowering future generations.",
                "Connecting alumni worldwide.",
                "Reuniting memories and dreams."
            ],
            typeSpeed: 50,
            backSpeed: 30,
            backDelay: 2000,
            loop: true
        });
    });
</script>
@endpush

@endsection
