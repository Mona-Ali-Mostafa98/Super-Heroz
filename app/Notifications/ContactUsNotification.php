<?php

namespace App\Notifications;

use App\Models\ContactUs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUsNotification extends Notification
{
    use Queueable;

    public $contact_us;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ContactUs $contact_us)
    {
        $this->contact_us = $contact_us;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['Mail' , 'database'];
    }


    public function toMail($notifiable)
    {
        // $url = url('/invoice/'.$this->invoice->id);
        $url = url('/admin/contact/'.$this->contact_us->id);

        return (new MailMessage)
                    ->greeting('Hello!')
                    ->line('لقد قام احد المستخدمين بارسال رساله !')
                    // ->lineIf($this->amount > 0, "Amount paid: {$this->amount}")
                    ->action('View Message Send', $url )
                    ->line('Thank you for using our application!');
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
            'name' => $this->contact_us->name,
            'email' => $this->contact_us->email,
            'message' => $this->contact_us->message
        ];
    }
}
