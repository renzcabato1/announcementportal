<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Server;
class UploadLetter extends Notification
{
    use Queueable;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $visor;
    protected $user;
    protected $request;

    public function __construct($visor,$user,$request)
    {
        //
        $this->visor = $visor;
        $this->personal =$user;
        $this->request =$request;
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
            ->subject('For Verification')
            ->line('Dear '.$this->visor->name.',')
            ->line('Your employee, '.$this->personal->name.' , has tendered resignation effective '.date('F. d, Y',strtotime($this->request->last_day)).'. Kindly check the uploaded details to proceed with clearance processing.')
            ->action('(click button)', $this->server->server_ip.'/uploaded-letter')
            ->line('This is an auto generated email please do not reply')
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
