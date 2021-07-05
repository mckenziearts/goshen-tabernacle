<?php

namespace Modules\Setting\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AdminSendCredentials extends Notification
{
    /**
     * Password Attribute.
     *
     * @var string
     */
    public string $password;

    /**
     * Create a new notification instance.
     *
     * @param  string  $password
     */
    public function __construct(string $password)
    {
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(__("Welcome to Goshen Tabernacle Management"))
            ->greeting("Hello $notifiable->full_name")
            ->line(__("An account has been created for you as Administrator on the website ") . env('APP_URL'))
            ->line("Email: $notifiable->email - Password: $this->password")
            ->line(__("You can use the following link to login:"))
            ->action('Login', route('login'))
            ->line(__("After logging in you need to change your password by clicking on your name in the sidebar of the admin area"));
    }
}
