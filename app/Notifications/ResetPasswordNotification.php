<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends ResetPassword
{
    /**
     * Build the mail representation of the notification.
     * Uses plain HTML instead of Markdown to avoid CommonMark timeout on PHP 8.5+
     */
    public function toMail($notifiable): MailMessage
    {
        $resetUrl = $this->resetUrl($notifiable);

        return (new MailMessage)
            ->subject('Reset Your BrightPath Alumni Password')
            ->view('emails.reset-password', [
                'resetUrl' => $resetUrl,
                'count'    => config('auth.passwords.'.config('auth.defaults.passwords').'.expire'),
                'user'     => $notifiable,
            ]);
    }
}