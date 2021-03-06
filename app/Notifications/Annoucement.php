<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Annoucement extends Notification implements ShouldQueue
{
    use Queueable;

    public $input;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($input,$user)
    {
        $this->input = $input;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('noreply@proplenx.com', 'Proplenx')
            ->subject('Proplenx Annoucement')
            ->markdown('mail.notification.index', ['input' => $this->input, 'user' => $this->user]);
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
            'title' => $this->input['title'],
            'body' => $this->input['body'],
        ];
    }
}
