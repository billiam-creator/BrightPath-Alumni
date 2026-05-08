<x-guest-layout>
    <h2>Forgot password?</h2>
    <p class="subtitle">No worries — we'll email you a reset link.</p>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert-status">
            <i class="fa fa-check-circle me-1"></i>{{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="form-label">Email Address</label>
            <div class="input-icon-wrap">
                <i class="fa fa-envelope icon"></i>
                <input id="email" type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required autofocus
                    placeholder="you@example.com">
            </div>
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-auth">
            <i class="fa fa-paper-plane me-2"></i>Email Reset Link
        </button>

        <p class="text-center small text-muted mt-3 mb-0">
            Remembered your password?
            <a href="{{ route('login') }}" class="auth-link">Back to sign in</a>
        </p>
    </form>
</x-guest-layout>
