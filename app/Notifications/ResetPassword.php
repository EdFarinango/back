<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification
{
    use Queueable;

    private string $token;
    private string $email;
    private string $user_name;

    /**
     * Create a new notification instance.
     *
     * @param string $token
     */
    public function __construct(string $user_name, string $token, string $email)
    {
        $this->token = $token;
        $this->email = $email;
        $this->user_name = $user_name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail( $notifiable ) {
        $link = route("password.reset", ["token" => $this->token, "email" => $this->email]);
        return ( new MailMessage )
            ->greeting("Hola $this->user_name,")
            ->subject( 'Notificación para restablecer tu contraseña')
            ->line( 'Te enviamos este correo porque hemos recibido una solicitud de restablecimiento de contraseña para tu cuenta.')
            ->line( 'Para restablecer tu contraseña has clic en el siguiente botón: ')
            ->action( 'Restablecer contraseña', $link)
            ->line( 'Si no has solicitado el restablecimiento de tu contraseña puedes olvidar este mensaje.')
            ->line( 'Este enlace caducará en 60 minutos.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
