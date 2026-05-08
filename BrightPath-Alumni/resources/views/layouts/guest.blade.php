<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BrightPath Alumni') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            z-index: 0;
        }

        .auth-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
        }

        .auth-logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .auth-logo a {
            text-decoration: none;
        }

        .auth-logo-text {
            font-size: 1.75rem;
            font-weight: 700;
            color: white;
            letter-spacing: -0.5px;
        }

        .auth-logo-sub {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.75);
            margin-top: 0.25rem;
        }

        .auth-card {
            background: white;
            border-radius: 1.25rem;
            padding: 2.5rem;
            box-shadow: 0 25px 50px rgba(0,0,0,0.25);
        }

        .auth-card h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.25rem;
        }

        .auth-card .subtitle {
            font-size: 0.875rem;
            color: #64748b;
            margin-bottom: 1.75rem;
        }

        .form-label {
            font-weight: 500;
            font-size: 0.875rem;
            color: #374151;
            margin-bottom: 0.4rem;
        }

        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 0.625rem;
            padding: 0.7rem 1rem;
            font-size: 0.9rem;
            transition: all 0.2s;
            background: #f9fafb;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37,99,235,0.15);
            background: white;
        }

        .btn-auth {
            background: var(--gradient);
            color: white;
            border: none;
            border-radius: 0.625rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            font-size: 0.95rem;
            width: 100%;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-auth:hover {
            opacity: 0.9;
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(102,126,234,0.4);
            color: white;
        }

        .auth-link {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .auth-link:hover {
            text-decoration: underline;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .alert-status {
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #15803d;
            border-radius: 0.625rem;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            margin-bottom: 1.25rem;
        }

        .field-error {
            font-size: 0.8rem;
            color: #ef4444;
            margin-top: 0.3rem;
        }

        .input-icon-wrap {
            position: relative;
        }

        .input-icon-wrap .form-control {
            padding-left: 2.75rem;
        }

        .input-icon-wrap .icon {
            position: absolute;
            left: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 0.95rem;
        }

        .divider {
            text-align: center;
            color: #9ca3af;
            font-size: 0.8rem;
            margin: 1.25rem 0;
            position: relative;
        }

        .divider::before, .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 42%;
            height: 1px;
            background: #e5e7eb;
        }
        .divider::before { left: 0; }
        .divider::after  { right: 0; }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-logo">
            <a href="{{ route('home') }}">
                <div class="auth-logo-text">🎓 BrightPath Alumni</div>
                <div class="auth-logo-sub">International School</div>
            </a>
        </div>

        <div class="auth-card">
            {{ $slot }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
