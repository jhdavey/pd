<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as BaseResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomMail;

class ResetPasswordNotification extends BaseResetPasswordNotification
{
    public function toMail($notifiable)
    {
        $greeting = "Hello!";
        $introLines = ["You are receiving this email because we received a password reset request for your account."];
        $actionText = "Reset Password";
        $actionUrl = url(route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false));
        $outroLines = ["This password reset link will expire in 60 minutes.", "If you did not request a password reset, no further action is required."];
        $salutation = "Regards,\n" . config('app.name');

        return (new CustomMail($greeting, $introLines, $actionText, $actionUrl, $outroLines, $salutation))
            ->to($notifiable->email);
    }
}
