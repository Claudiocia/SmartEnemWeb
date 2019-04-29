<?php

namespace SmartEnem\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class DefaultResetPassowrdNotification extends ResetPassword
{

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Redefinição de Senha')
            ->line('Você está recebendo este e-mail, porque foi solicitada uma redefinição de senha')
            ->action('Redefinir senha', route('password.reset', $this->token))
            ->line('Se você não fez esta requisição, por favor desconsidere');
    }

}
