<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SubmissionUpdate extends Notification implements ShouldQueue
{
    use Queueable;

     public $submission;
     public $old_status;
     public $new_status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($submission,$old_status,$new_status)
    {
        $this->submission = $submission;
        $this->old_status = $old_status;
        $this->new_status = $new_status;
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
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->markdown('mail.submission.update',[
            'submission' => $this->submission,
            'old_status' => $this->old_status,
            'new_status' => $this->new_status
        ]);
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
