<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Server;
class CancelResignationNotif extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $visor;
    public function __construct($visor)
    {
        //
        $this->visor = $visor;  
        $this->server = Server::first();
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
                ->greeting(' ')
                ->subject('Cancel Resignation')
                ->line('Dear '.$this->visor->name.',')
                ->line('Please be informed that '.auth()->user()->name.' has cancelled or retracted the submitted resignation letter on '.date('M. d, Y').'. For your approval, please click below.')
                ->action('(click button)', $this->server->server_ip.'/cancel-resignations')
                ->line('This is an auto generated email please do not reply!')
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
