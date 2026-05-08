<x-guest-layout>
    <h2>Welcome back</h2>
    <p class="subtitle">Sign in to your alumni account</p>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert-status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <div class="input-icon-wrap">
                <i class="fa fa-envelope icon"></i>
                <input id="email" type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required autofocus autocomplete="username"
                    placeholder="you@example.com">
            </div>
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <label for="password" class="form-label mb-0">Password</label>
                @if (Route::has('password.request'))
                    <a class="auth-link" href="{{ route('password.request') }}">Forgot password?</a>
                @endif
            </div>
            <div class="input-icon-wrap mt-1">
                <i class="fa fa-lock icon"></i>
                <input id="password" type="password" name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required autocomplete="current-password" placeholder="••••••••">
            </div>
            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
            <label class="form-check-label text-muted small" for="remember_me">Remember me for 30 days</label>
        </div>

        <button type="submit" class="btn-auth">
            <i class="fa fa-sign-in-alt me-2"></i>Sign In
        </button>

        <div class="divider">or</div>

        <p class="text-center small text-muted mb-0">
            Don't have an account?
            <a href="{{ route('register') }}" class="auth-link">Create one</a>
        </p>
    </form>
</x-guest-layout>
