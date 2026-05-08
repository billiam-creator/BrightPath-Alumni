<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
</head>
<body style="margin:0;padding:0;background:#f1f5f9;font-family:'Inter',Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 20px;">
        <tr>
            <td align="center">

                <!-- Card -->
                <table width="520" cellpadding="0" cellspacing="0"
                       style="background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,0.08);">

                    <!-- Header -->
                    <tr>
                        <td style="background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);padding:36px 40px;text-align:center;">
                            <div style="font-size:2rem;margin-bottom:8px;">🎓</div>
                            <h1 style="color:#ffffff;font-size:22px;font-weight:700;margin:0;letter-spacing:-0.3px;">
                                BrightPath Alumni
                            </h1>
                            <p style="color:rgba(255,255,255,0.8);font-size:13px;margin:4px 0 0;">
                                International School Network
                            </p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:40px 40px 32px;">
                            <h2 style="color:#1e293b;font-size:20px;font-weight:700;margin:0 0 12px;">
                                Password Reset Request
                            </h2>
                            <p style="color:#475569;font-size:15px;line-height:1.6;margin:0 0 24px;">
                                Hi {{ $user->name }},<br><br>
                                We received a request to reset the password for your BrightPath Alumni account.
                                Click the button below to choose a new password.
                            </p>

                            <!-- CTA Button -->
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" style="padding:8px 0 28px;">
                                        <a href="{{ $resetUrl }}"
                                           style="display:inline-block;background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);
                                                  color:#ffffff;text-decoration:none;font-size:15px;font-weight:600;
                                                  padding:14px 36px;border-radius:8px;letter-spacing:0.2px;">
                                            Reset My Password
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <!-- Expiry notice -->
                            <div style="background:#fef9ec;border:1px solid #fde68a;border-radius:8px;padding:14px 16px;margin-bottom:24px;">
                                <p style="color:#92400e;font-size:13px;margin:0;">
                                    ⏱ This link will expire in <strong>{{ $count }} minutes</strong>.
                                    If you did not request a reset, you can safely ignore this email.
                                </p>
                            </div>

                            <!-- Fallback URL -->
                            <p style="color:#94a3b8;font-size:12px;line-height:1.6;margin:0;">
                                If the button above doesn't work, copy and paste this URL into your browser:<br>
                                <a href="{{ $resetUrl }}" style="color:#667eea;word-break:break-all;">
                                    {{ $resetUrl }}
                                </a>
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f8fafc;border-top:1px solid #e2e8f0;padding:20px 40px;text-align:center;">
                            <p style="color:#94a3b8;font-size:12px;margin:0;">
                                &copy; {{ date('Y') }} BrightPath International School Alumni. All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>
                <!-- End Card -->

            </td>
        </tr>
    </table>

</body>
</html>