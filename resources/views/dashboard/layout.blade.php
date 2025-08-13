<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

<!-- Top Navbar -->
<nav class="w-full bg-blue-600 text-white px-6 py-3 shadow flex justify-between items-center" style="height: 64px;">
    <div class="text-xl font-bold tracking-wide">🏫 BrightPath Alumni Admin</div>
    <div class="flex items-center gap-4">
        <div class="relative">
            <button type="button" class="flex items-center gap-2 focus:outline-none group">
                <img src="https://ui-avatars.com/api/?name=Admin" class="rounded-full h-8 w-8 border-2 border-white" alt="Admin Avatar">
                <span class="font-medium">Admin</span>
            </button>
        </div>
    </div>
</nav>

<!-- Sidebar + Content Layout -->
<div class="flex min-h-[calc(100vh-64px)]">
    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-white p-6" style="box-shadow: 2px 0 10px rgba(0,0,0,0.05);">
        <h2 class="text-2xl font-semibold mb-6">📊 Dashboard</h2>
        <nav class="space-y-2 text-sm">
            <a href="{{ route('dashboard') }}"
               class="block py-2 px-4 rounded transition {{ request()->routeIs('dashboard') ? 'bg-blue-600' : 'hover:bg-gray-700' }}">
                🏠 Home
            </a>
            <a href="{{ route('dashboard.events.index') }}"
               class="block py-2 px-4 rounded transition {{ request()->routeIs('dashboard.events.*') ? 'bg-blue-600' : 'hover:bg-gray-700' }}">
                📅 Events
            </a>
            <a href="{{ route('dashboard.members.index') }}"
               class="block py-2 px-4 rounded transition {{ request()->routeIs('dashboard.members.*') ? 'bg-blue-600' : 'hover:bg-gray-700' }}">
                👥 Members
            </a>
            <a href="{{ route('dashboard.gallery.index') }}"
               class="block py-2 px-4 rounded transition {{ request()->routeIs('dashboard.gallery.*') ? 'bg-blue-600' : 'hover:bg-gray-700' }}">
                🖼️ Gallery
            </a>

            <form method="POST" action="{{ route('logout') }}" class="mt-6">
                @csrf
                <button type="submit"
                        class="w-full text-left py-2 px-4 rounded bg-red-600 hover:bg-red-700 transition">
                    🚪 Logout
                </button>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6 bg-white overflow-auto" style="min-height: calc(100vh - 64px);">
        @yield('content')
    </div>
</div>

</body>
</html>
