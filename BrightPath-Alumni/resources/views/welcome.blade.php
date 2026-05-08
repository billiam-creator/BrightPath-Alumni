@extends('layout.frontend')

@section('content')

<!-- HERO SECTION -->
<section class="hero-banner text-white d-flex align-items-center" style="
    background: linear-gradient(135deg, #1e3a5f 0%, #2563eb 60%, #4f46e5 100%);
    min-height: 88vh;
    position: relative;
    overflow: hidden;
">
    <!-- Decorative circles -->
    <div style="position:absolute;top:-80px;right:-80px;width:350px;height:350px;border-radius:50%;background:rgba(255,255,255,0.05);"></div>
    <div style="position:absolute;bottom:-60px;left:-60px;width:250px;height:250px;border-radius:50%;background:rgba(255,255,255,0.05);"></div>

    <div class="container position-relative text-center py-5">
        <span class="badge mb-3 px-3 py-2" style="background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.3);border-radius:99px;font-size:0.85rem;color:white;">
            🎓 BrightPath International School
        </span>
        <h1 class="display-3 fw-bold mb-3 animate__animated animate__fadeInDown">
            Welcome to <span style="color:#fbbf24;">BrightPath Alumni</span>
        </h1>
        <h4 class="mt-3 text-white-50 mb-4 animate__animated animate__fadeInUp animate__delay-1s" id="typed-text" style="min-height:1.6em;"></h4>
        <div class="d-flex gap-3 justify-content-center flex-wrap animate__animated animate__fadeInUp animate__delay-1s">
            <a href="{{ route('events.index') }}" class="btn btn-warning btn-lg px-4 fw-semibold">
                Explore Events <i class="fa fa-arrow-right ms-2"></i>
            </a>
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-4">
                Join Community
            </a>
        </div>
        <div class="d-flex justify-content-center gap-4 mt-5 text-white-50" style="font-size:0.85rem;">
            <span><i class="fa fa-users me-1"></i>Active alumni network</span>
            <span><i class="fa fa-calendar me-1"></i>Regular events</span>
            <span><i class="fa fa-globe me-1"></i>Global connections</span>
        </div>
    </div>
</section>

<!-- STATS STRIP -->
<section class="py-4 bg-white border-bottom">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3">
                <div class="fw-bold fs-3" style="color:#2563eb;">500+</div>
                <div class="text-muted small">Alumni Members</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="fw-bold fs-3" style="color:#2563eb;">20+</div>
                <div class="text-muted small">Years of History</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="fw-bold fs-3" style="color:#2563eb;">50+</div>
                <div class="text-muted small">Annual Events</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="fw-bold fs-3" style="color:#2563eb;">30+</div>
                <div class="text-muted small">Countries Reached</div>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES SECTION -->
<section id="services" class="py-5 bg-light">
    <div class="container text-center">
        <span class="badge mb-2 px-3 py-2" style="background:#ede9fe;color:#7c3aed;border-radius:99px;">What We Offer</span>
        <h2 class="fw-bold mb-2">Alumni Services</h2>
        <p class="text-muted mb-5">Empowering connections beyond graduation</p>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm fade-in" style="border-radius:1rem;padding:2rem;">
                    <div class="fs-1 mb-3">🎓</div>
                    <h5 class="fw-bold text-primary">Mentorship</h5>
                    <p class="text-muted small">Support current students and fellow alumni through career guidance and personalised mentorship programs.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm fade-in" style="border-radius:1rem;padding:2rem;">
                    <div class="fs-1 mb-3">🤝</div>
                    <h5 class="fw-bold text-primary">Networking</h5>
                    <p class="text-muted small">Connect with alumni from different years and industries across the globe through curated networking events.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm fade-in" style="border-radius:1rem;padding:2rem;">
                    <div class="fs-1 mb-3">📅</div>
                    <h5 class="fw-bold text-primary">Events & Reunions</h5>
                    <p class="text-muted small">Participate in memorable events that bring BrightPath graduates together from around the world.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="py-5 bg-white">
    <div class="container text-center">
        <span class="badge mb-2 px-3 py-2" style="background:#dcfce7;color:#16a34a;border-radius:99px;">Alumni Voices</span>
        <h2 class="fw-bold mb-5">What Our Alumni Say</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 fade-in" style="background:#f8fafc;border-radius:1rem;padding:2rem;text-align:left;">
                    <div class="fs-3 mb-2">💬</div>
                    <p class="fst-italic text-muted">"BrightPath shaped who I am today. The alumni network opened doors I never imagined."</p>
                    <div class="d-flex align-items-center gap-2 mt-3">
                        <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#667eea,#764ba2);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.85rem;">E</div>
                        <div>
                            <div class="fw-semibold" style="font-size:0.875rem;color:#1e293b;">Esther N.</div>
                            <div style="font-size:0.775rem;color:#64748b;">Class of 2011</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 fade-in" style="background:#f8fafc;border-radius:1rem;padding:2rem;text-align:left;">
                    <div class="fs-3 mb-2">💬</div>
                    <p class="fst-italic text-muted">"I reconnected with old friends and mentors through the alumni site. It's more than a network — it's a family."</p>
                    <div class="d-flex align-items-center gap-2 mt-3">
                        <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#f093fb,#f5576c);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.85rem;">B</div>
                        <div>
                            <div class="fw-semibold" style="font-size:0.875rem;color:#1e293b;">Brian K.</div>
                            <div style="font-size:0.775rem;color:#64748b;">Class of 2015</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="py-5" style="background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);">
    <div class="container text-center text-white py-3">
        <h2 class="fw-bold mb-3">Ready to reconnect?</h2>
        <p class="mb-4 text-white-50">Join hundreds of BrightPath alumni who are already connected, growing and thriving together.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('register') }}" class="btn btn-warning btn-lg px-4 fw-semibold">Get Started Free</a>
            <a href="{{ route('contact.index') }}" class="btn btn-outline-light btn-lg px-4">Contact Us</a>
        </div>
    </div>
</section>

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
