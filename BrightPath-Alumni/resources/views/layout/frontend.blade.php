<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrightPath Alumni - International School</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --accent-color: #f59e0b;
            --dark-color: #1e293b;
            --light-bg: #f8fafc;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 30px rgba(0,0,0,0.12);
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--light-bg);
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* ── Navbar ──────────────────────────────── */
        #mainNavbar {
            background: rgba(255,255,255,0.97) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            padding: 0.75rem 0;
        }

        #mainNavbar.scrolled {
            box-shadow: var(--shadow-md);
        }

        .navbar-brand {
            font-weight: 700 !important;
            font-size: 1.4rem;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-dark) !important;
            transition: all 0.25s ease;
            padding: 0.45rem 0.8rem !important;
            border-radius: 0.5rem;
            font-size: 0.9rem;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary-color) !important;
            background: rgba(37,99,235,0.08);
        }

        .btn-nav-login {
            border: 1.5px solid var(--primary-color);
            color: var(--primary-color) !important;
            border-radius: 0.5rem;
            padding: 0.4rem 1rem !important;
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.25s;
        }

        .btn-nav-login:hover {
            background: var(--primary-color);
            color: white !important;
        }

        .btn-nav-register {
            background: var(--gradient-primary);
            color: white !important;
            border-radius: 0.5rem;
            padding: 0.4rem 1rem !important;
            font-weight: 500;
            font-size: 0.875rem;
            border: none;
            transition: all 0.25s;
            box-shadow: var(--shadow-sm);
        }

        .btn-nav-register:hover {
            opacity: 0.9;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
            color: white !important;
        }

        .btn-nav-logout {
            border: 1.5px solid #ef4444;
            color: #ef4444 !important;
            border-radius: 0.5rem;
            padding: 0.4rem 1rem !important;
            font-weight: 500;
            font-size: 0.875rem;
            background: transparent;
            cursor: pointer;
            transition: all 0.25s;
        }

        .btn-nav-logout:hover {
            background: #ef4444;
            color: white !important;
        }

        /* ── Main Content ─────────────────────────── */
        main { min-height: calc(100vh - 64px - 280px); }

        /* ── Alerts ──────────────────────────────── */
        .alert {
            border-radius: 0.75rem;
            border: none;
            font-size: 0.9rem;
        }

        /* ── Buttons ──────────────────────────────── */
        .btn {
            font-weight: 500;
            border-radius: 0.625rem;
            transition: all 0.25s ease;
        }

        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            opacity: 0.9;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-warning {
            font-weight: 600;
        }

        /* ── Form controls ────────────────────────── */
        .form-control {
            border: 1.5px solid var(--border-color);
            border-radius: 0.625rem;
            padding: 0.65rem 1rem;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(37,99,235,0.2);
        }

        /* ── Cards ────────────────────────────────── */
        .card {
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            box-shadow: var(--shadow-sm);
            transition: box-shadow 0.3s, transform 0.3s;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        /* ── Footer ────────────────────────────────── */
        footer {
            background: var(--dark-color) !important;
            border-top: 3px solid;
            border-image: var(--gradient-primary) 1;
        }

        footer h5, footer h6 {
            font-weight: 600;
            color: #f1f5f9;
            margin-bottom: 1rem;
        }

        footer .text-muted { color: #94a3b8 !important; }

        footer a.text-muted {
            text-decoration: none;
            transition: color 0.2s;
        }

        footer a.text-muted:hover { color: white !important; }

        footer ul li { margin-bottom: 0.5rem; }

        /* ── Scrollbar ─────────────────────────────── */
        ::-webkit-scrollbar { width: 7px; }
        ::-webkit-scrollbar-track { background: var(--light-bg); }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--primary-color); }

        /* ── Fade-in ──────────────────────────────── */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── Responsive ───────────────────────────── */
        @media (max-width: 768px) {
            .navbar-brand { font-size: 1.1rem; }
        }
    </style>
</head>
<body>

<!-- ── Navbar ────────────────────────────────────────────────────────────── -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">🎓 BrightPath Alumni</a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto align-items-center gap-1 mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('events') ? 'active' : '' }}" href="{{ route('events.index') }}">Events</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('members') ? 'active' : '' }}" href="{{ route('members') }}">Members</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact.index') }}">Contact</a></li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="fa fa-gauge-high me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn-nav-logout nav-link">
                                <i class="fa fa-sign-out-alt me-1"></i>Logout
                            </button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item ms-2">
                        <a class="nav-link btn-nav-login" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-nav-register" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- ── Flash Messages ──────────────────────────────────────────────────────── -->
@if (session('success'))
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="container mt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

<!-- ── Main Content ───────────────────────────────────────────────────────── -->
<main>
    @yield('content')
</main>

<!-- ── Footer ────────────────────────────────────────────────────────────── -->
<footer class="bg-dark text-light pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5>🎓 BrightPath Alumni</h5>
                <p class="text-muted small">Uniting past students of BrightPath International School to share, network, and grow together.</p>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="text-muted fs-5"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-muted fs-5"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-muted fs-5"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-muted fs-5"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-md-2">
                <h6>Navigate</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('about') }}" class="text-muted">About</a></li>
                    <li><a href="{{ route('services') }}" class="text-muted">Services</a></li>
                    <li><a href="{{ route('events.index') }}" class="text-muted">Events</a></li>
                    <li><a href="{{ route('gallery') }}" class="text-muted">Gallery</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h6>Community</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('members') }}" class="text-muted">Members</a></li>
                    <li><a href="{{ route('contact.index') }}" class="text-muted">Contact</a></li>
                    @guest
                        <li><a href="{{ route('login') }}" class="text-muted">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-muted">Register</a></li>
                    @endguest
                </ul>
            </div>
            <div class="col-md-4">
                <h6>Stay Connected</h6>
                <p class="text-muted small">Subscribe to our newsletter for updates on events and alumni news.</p>
                <form class="d-flex gap-2 mt-2">
                    <input type="email" class="form-control form-control-sm" placeholder="Your email address">
                    <button type="submit" class="btn btn-sm btn-primary text-nowrap">Subscribe</button>
                </form>
            </div>
        </div>
        <hr class="border-secondary mt-4">
        <div class="text-center text-muted small">
            &copy; {{ date('Y') }} BrightPath International School Alumni. All rights reserved.
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Navbar scroll effect
    const mainNavbar = document.getElementById('mainNavbar');
    window.addEventListener('scroll', () => {
        mainNavbar.classList.toggle('scrolled', window.scrollY > 50);
    });

    // Smooth anchor scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Fade-in on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('visible');
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
</script>

@stack('scripts')

</body>
</html>
