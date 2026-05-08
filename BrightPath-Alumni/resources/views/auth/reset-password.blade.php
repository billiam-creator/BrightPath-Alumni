<x-guest-layout>
    <h2>Set new password</h2>
    <p class="subtitle">Choose a strong password for your account.</p>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <div class="input-icon-wrap">
                <i class="fa fa-envelope icon"></i>
                <input id="email" type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $request->email) }}"
                    required autofocus autocomplete="username"
                    placeholder="you@example.com">
            </div>
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
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
            <label for="password_confirmation" class="form-label">Confirm New Password</label>
            <div class="input-icon-wrap">
                <i class="fa fa-shield-alt icon"></i>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    required autocomplete="new-password" placeholder="Repeat new password">
            </div>
            @error('password_confirmation')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-auth">
            <i class="fa fa-key me-2"></i>Reset Password
        </button>
    </form>
</x-guest-layout>
