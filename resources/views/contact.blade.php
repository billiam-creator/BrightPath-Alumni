@extends('layout.frontend')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-4 animate-fade-in" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Header -->
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary">Get In Touch</h2>
                <hr class="w-25 mx-auto text-primary">
                <p class="lead text-muted">We'd love to hear from you! Drop us a message and we'll get back to you as soon as possible.</p>
            </div>

            <!-- Contact Form -->
            <div class="card shadow rounded-4 border-0">
                <div class="card-body p-5 bg-light">
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold">Your Name</label>
                                <input type="text" class="form-control form-control-lg rounded-3" id="name" name="name" placeholder="Enter your full name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Your Email</label>
                                <input type="email" class="form-control form-control-lg rounded-3" id="email" name="email" placeholder="your.email@example.com" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label fw-semibold">Your Message</label>
                            <textarea class="form-control form-control-lg rounded-3" id="message" name="message" rows="6" placeholder="Tell us what's on your mind..." required></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                                <i class="bi bi-send me-2"></i>Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
/* Smooth fade in for alert */
@keyframes fade-in {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fade-in 0.5s ease-out;
}

/* Optional: Add light border glow on input focus */
.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}
</style>

@endsection
