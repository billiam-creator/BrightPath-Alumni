<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - BrightPath Alumni Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 250px;
            --topbar-height: 62px;
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --sidebar-bg: #1e1b4b;
            --sidebar-hover: rgba(255,255,255,0.08);
            --sidebar-active: #4f46e5;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
            margin: 0;
        }

        /* ── Topbar ───────────────────────────────── */
        .topbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            height: var(--topbar-height);
            background: white;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        }

        .topbar-brand {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
        }

        .topbar-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex; align-items: center; justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.85rem;
        }

        .btn-visit-site {
            font-size: 0.8rem;
            padding: 0.35rem 0.85rem;
            border-radius: 0.5rem;
            background: #f1f5f9;
            color: #475569;
            text-decoration: none;
            border: 1px solid #e2e8f0;
            transition: all 0.2s;
        }

        .btn-visit-site:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* ── Sidebar ──────────────────────────────── */
        .sidebar {
            position: fixed;
            top: var(--topbar-height);
            left: 0;
            width: var(--sidebar-width);
            height: calc(100vh - var(--topbar-height));
            background: var(--sidebar-bg);
            overflow-y: auto;
            padding: 1.5rem 1rem;
            z-index: 90;
        }

        .sidebar-section {
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #7c73c0;
            margin: 1.25rem 0 0.5rem 0.5rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 0.75rem;
            border-radius: 0.625rem;
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s;
            margin-bottom: 0.15rem;
        }

        .sidebar-link i {
            width: 18px;
            text-align: center;
            font-size: 0.9rem;
        }

        .sidebar-link:hover {
            background: var(--sidebar-hover);
            color: white;
        }

        .sidebar-link.active {
            background: var(--sidebar-active);
            color: white;
            box-shadow: 0 4px 12px rgba(79,70,229,0.4);
        }

        .sidebar-logout {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            width: 100%;
            padding: 0.6rem 0.75rem;
            border-radius: 0.625rem;
            color: #fca5a5;
            font-size: 0.875rem;
            font-weight: 500;
            background: transparent;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 0.25rem;
        }

        .sidebar-logout:hover {
            background: rgba(239,68,68,0.15);
            color: #f87171;
        }

        /* ── Main Content ─────────────────────────── */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--topbar-height);
            padding: 2rem;
            min-height: calc(100vh - var(--topbar-height));
        }

        /* ── Page Header ──────────────────────────── */
        .page-header {
            margin-bottom: 1.75rem;
        }

        .page-header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        .page-header p {
            color: #64748b;
            font-size: 0.875rem;
            margin: 0.25rem 0 0;
        }

        /* ── Card ─────────────────────────────────── */
        .dash-card {
            background: white;
            border-radius: 1rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* ── Stat Cards ───────────────────────────── */
        .stat-card {
            background: white;
            border-radius: 1rem;
            border: 1px solid #e2e8f0;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .stat-icon {
            width: 48px; height: 48px;
            border-radius: 0.75rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.25rem;
        }

        .stat-value {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1e293b;
            line-height: 1;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #64748b;
            margin-top: 0.2rem;
        }

        /* ── Tables ───────────────────────────────── */
        .dash-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 0.875rem;
        }

        .dash-table th {
            background: #f8fafc;
            color: #64748b;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .dash-table td {
            padding: 0.85rem 1rem;
            color: #374151;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .dash-table tbody tr:last-child td { border-bottom: none; }

        .dash-table tbody tr:hover td { background: #f8fafc; }

        /* ── Buttons ──────────────────────────────── */
        .btn-add {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 0.625rem;
            padding: 0.55rem 1.1rem;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-add:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79,70,229,0.35);
        }

        .btn-edit {
            color: var(--primary);
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            padding: 0.3rem 0.7rem;
            border-radius: 0.4rem;
            background: rgba(79,70,229,0.08);
            transition: all 0.2s;
        }

        .btn-edit:hover {
            background: var(--primary);
            color: white;
        }

        .btn-delete {
            color: #ef4444;
            font-size: 0.8rem;
            font-weight: 500;
            padding: 0.3rem 0.7rem;
            border-radius: 0.4rem;
            background: rgba(239,68,68,0.08);
            border: none;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-delete:hover {
            background: #ef4444;
            color: white;
        }

        /* ── Forms ────────────────────────────────── */
        .dash-form label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            display: block;
            margin-bottom: 0.4rem;
        }

        .dash-form input,
        .dash-form textarea,
        .dash-form select {
            width: 100%;
            border: 1.5px solid #e2e8f0;
            border-radius: 0.625rem;
            padding: 0.65rem 1rem;
            font-size: 0.875rem;
            font-family: inherit;
            color: #1e293b;
            background: white;
            transition: all 0.2s;
            outline: none;
        }

        .dash-form input:focus,
        .dash-form textarea:focus,
        .dash-form select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79,70,229,0.12);
        }

        .dash-form .form-group { margin-bottom: 1.25rem; }

        /* ── Alerts ───────────────────────────────── */
        .alert-success {
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #15803d;
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert-error {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            margin-bottom: 1.25rem;
        }

        /* ── Responsive sidebar toggle ─────────────── */
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); transition: transform 0.3s; }
            .sidebar.open { transform: translateX(0); }
            .main-content { margin-left: 0; }
            .topbar { padding: 0 1rem; }
        }
    </style>
</head>
<body>

<!-- ── Topbar ──────────────────────────────────────────────────────────────── -->
<div class="topbar">
    <div class="topbar-brand">
        <i class="fa fa-graduation-cap"></i>
        BrightPath Admin
    </div>
    <div class="topbar-right">
        <a href="{{ route('home') }}" class="btn-visit-site" target="_blank">
            <i class="fa fa-external-link-alt me-1"></i>Visit Site
        </a>
        <div class="topbar-user">
            <div class="topbar-avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
            <span>{{ auth()->user()->name ?? 'Admin' }}</span>
        </div>
    </div>
</div>

<!-- ── Sidebar ──────────────────────────────────────────────────────────────── -->
<aside class="sidebar">
    <div class="sidebar-section">Main</div>

    <a href="{{ route('dashboard') }}"
       class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="fa fa-house"></i> Home
    </a>

    <div class="sidebar-section">Manage</div>

    <a href="{{ route('dashboard.events.index') }}"
       class="sidebar-link {{ request()->routeIs('dashboard.events.*') ? 'active' : '' }}">
        <i class="fa fa-calendar-days"></i> Events
    </a>

    <a href="{{ route('dashboard.members.index') }}"
       class="sidebar-link {{ request()->routeIs('dashboard.members.*') ? 'active' : '' }}">
        <i class="fa fa-users"></i> Members
    </a>

    <a href="{{ route('dashboard.gallery.index') }}"
       class="sidebar-link {{ request()->routeIs('dashboard.gallery.*') ? 'active' : '' }}">
        <i class="fa fa-images"></i> Gallery
    </a>

    <div class="sidebar-section">Account</div>

    <a href="{{ route('profile.edit') }}"
       class="sidebar-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
        <i class="fa fa-user-gear"></i> My Profile
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="sidebar-logout">
            <i class="fa fa-right-from-bracket"></i> Logout
        </button>
    </form>
</aside>

<!-- ── Main Content ─────────────────────────────────────────────────────────── -->
<main class="main-content">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
