<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ForApprovalNotif extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $request;
    protected $total;
    public function __construct($request,$total)
    {
        //
        $this->request = $request;
        $this->total = $total;
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
        return (new MailMessage)
            ->subject('For Approval Notification (Excess Usage)')
            ->greeting('Good day,')
            ->line('Employee :'.auth()->user()->name)
            ->line('Official Business :'.$this->request->official_business)
            ->line('Personal Expense :'.$this->request->personal_expense)
            ->line('Total Excess Usage :'.$this->total)
            ->line('Remarks / Reason :'.$this->request->reason)
            ->line('Please click the button provided for faster transaction')
            ->action('Pending For Approval', url('/for-approval'))
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
            //
        ];
    }
}
