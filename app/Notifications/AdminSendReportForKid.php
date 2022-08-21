<?php

namespace App\Notifications;

use App\Models\KidReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminSendReportForKid extends Notification
{
    use Queueable;
    public $report;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(KidReport $report)
    {
        $this->report = $report;
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
            'kid_id' => $this->report->kid_id,
            'user_id' => $this->report->user_id,
            'report' => $this->report->report,
        ];
    }
}