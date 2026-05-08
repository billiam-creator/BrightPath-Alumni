<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        try {
            $status = Password::sendResetLink(
                $request->only('email')
            );
        } catch (\Exception $e) {
            // Log the real error for debugging, show a safe message to the user
            Log::error('Password reset email failed: ' . $e->getMessage());

            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Could not send the reset email. Please check your mail settings in .env or try again later.',
                ]);
        }

        // Success — use a generic message to prevent user enumeration
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with(
                'status',
                'If an account with that email exists, a password reset link has been sent.'
            );
        }

        // Throttled — give the real message
        if ($status === Password::RESET_THROTTLED) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => __('Please wait before requesting another reset link.')]);
        }

        // INVALID_USER — still show the generic message (no user enumeration)
        return back()->with(
            'status',
            'If an account with that email exists, a password reset link has been sent.'
        );
    }
}