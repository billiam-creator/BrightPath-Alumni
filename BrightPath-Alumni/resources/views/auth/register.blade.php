<x-guest-layout>
    <h2>Create account</h2>
    <p class="subtitle">Join the BrightPath Alumni community</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <div class="input-icon-wrap">
                <i class="fa fa-user icon"></i>
                <input id="name" type="text" name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" required autofocus autocomplete="name"
                    placeholder="John Doe">
            </div>
            @error('name')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <div class="input-icon-wrap">
                <i class="fa fa-envelope icon"></i>
                <input id="email" type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required autocomplete="username"
                    placeholder="you@example.com">
            </div>
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-icon-wrap">
                <i class="fa fa-lock icon"></i>
                <input id="password" type="password" name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required autocomplete="new-password" placeholder="Min. 8 characters">
            </div>
            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <div class="input-icon-wrap">
                <i class="fa fa-shield-alt icon"></i>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    required autocomplete="new-password" placeholder="Repeat password">
            </div>
            @error('password_confirmation')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-auth">
            <i class="fa fa-user-plus me-2"></i>Create Account
        </button>

        <div class="divider">or</div>

        <p class="text-center small text-muted mb-0">
            Already have an account?
            <a href="{{ route('login') }}" class="auth-link">Sign in</a>
        </p>
    </form>
</x-guest-layout>
