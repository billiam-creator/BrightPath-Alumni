@extends('layout.frontend')

@section('content')
<style>
    .service-card:hover .icon-box {
        transform: scale(1.2);
        transition: transform 0.4s ease;
    }
</style>

<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary">Our Alumni Services</h2>
            <p class="text-muted">BrightPath Alumni is committed to lifelong connection, growth, and contribution.</p>
        </div>

        <div class="row g-4">
            <!-- Mentorship -->
            <div class="col-md-4">
                <div class="bg-light p-4 rounded shadow-sm text-center service-card h-100">
                    <div class="icon-box bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-person-check fs-3"></i>
                    </div>
                    <h5 class="fw-semibold text-dark">Mentorship</h5>
                    <p class="text-muted">Guide and inspire current students by sharing your career experience and wisdom.</p>
                </div>
            </div>

            <!-- Career Opportunities -->
            <div class="col-md-4">
                <div class="bg-light p-4 rounded shadow-sm text-center service-card h-100">
                    <div class="icon-box bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-briefcase fs-3"></i>
                    </div>
                    <h5 class="fw-semibold text-dark">Career Opportunities</h5>
                    <p class="text-muted">Explore job openings, post opportunities, or collaborate through alumni networks.</p>
                </div>
            </div>

            <!-- Events & Reunions -->
            <div class="col-md-4">
                <div class="bg-light p-4 rounded shadow-sm text-center service-card h-100">
                    <div class="icon-box bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-calendar-event fs-3"></i>
                    </div>
                    <h5 class="fw-semibold text-dark">Events & Reunions</h5>
                    <p class="text-muted">Participate in annual meetups, career fairs, or nostalgic campus reunions.</p>
                </div>
            </div>

            <!-- Alumni Directory -->
            <div class="col-md-4">
                <div class="bg-light p-4 rounded shadow-sm text-center service-card h-100">
                    <div class="icon-box bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-people fs-3"></i>
                    </div>
                    <h5 class="fw-semibold text-dark">Alumni Directory</h5>
                    <p class="text-muted">Find and connect with fellow BrightPath alumni based on year, industry, or location.</p>
                </div>
            </div>

            <!-- Scholarships -->
            <div class="col-md-4">
                <div class="bg-light p-4 rounded shadow-sm text-center service-card h-100">
                    <div class="icon-box bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-award fs-3"></i>
                    </div>
                    <h5 class="fw-semibold text-dark">Alumni Scholarships</h5>
                    <p class="text-muted">Give back by sponsoring scholarships or educational funds for future students.</p>
                </div>
            </div>

            <!-- News & Updates -->
            <div class="col-md-4">
                <div class="bg-light p-4 rounded shadow-sm text-center service-card h-100">
                    <div class="icon-box bg-secondary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-newspaper fs-3"></i>
                    </div>
                    <h5 class="fw-semibold text-dark">News & Updates</h5>
                    <p class="text-muted">Stay up to date with alumni stories, school developments, and major milestones.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
