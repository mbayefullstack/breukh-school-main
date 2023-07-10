<?php

namespace App\Notifications;

use App\Models\Evenement;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventReminderNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Evenement $evenement)
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
                    ->subject("Rappel d'evenement")
                    ->line('Message de Rappel : Vous avez un evenement à venir')
                    ->action("Voir l'evenement", route('evenements.show',$this->evenement->id))
                    ->line("Evenement : {$this->evenement->titre}")
                    ->line($this->evenement->description);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'evenement_id'  => $this->evenement->id,
            'evenement_titre'   => $this->evenement->titre
        ];
    }
}
