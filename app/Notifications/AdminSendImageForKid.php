<?php

namespace App\Notifications;

use App\Models\KidImage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminSendImageForKid extends Notification
{
    use Queueable;
    public $image;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(KidImage $image)
    {
        $this->image = $image;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'kid_id' => $this->image->kid_id,
            'user_id' => $this->image->user_id,
            'image' => $this->image->image,
        ];
    }
}