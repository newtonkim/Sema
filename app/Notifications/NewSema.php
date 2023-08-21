<?php

namespace App\Notifications;

use App\Models\Sema;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewSema extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Sema $sema)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    // ->line('The introduction to the notification.')
                    ->subject("New Sema from {$this->sema->user->name}")
                    ->greeting("New Sema from {$this->sema->user->name}")
                    ->line(Str::limit($this->sema->message, 50))
                    ->action('Go to Sema', url('/'))
                    ->line('Thank you for using Sema application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
