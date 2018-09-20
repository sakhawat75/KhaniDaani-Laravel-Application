<?php

namespace App\Notifications;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyOrder extends Notification
{
//    use Queueable;

    protected $order = null;
    protected $type = null;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order, $type)
    {
        $this->order = $order;
        $this->type = $type;
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
//        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/order/status/'.$this->order->id);

        return (new MailMessage)
                    ->greeting('Congratulation!')
                    ->line('You Have a New Order ')
                    ->action('View Order', url($url))
                    ->line('Thank you for using our KhaniDaani platform!');
    }

	/**
	 * Get the Database representation of the notification.
	 *
	 * @param $notifiable
	 *
	 * @return array
	 */
	public function toDatabase($notifiable)
	{
		return [
			'order' => $this->order,
			'noti_type' => $this->type,  
		];
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
            'order' => $this->order,
			'noti_type' => $this->type,
        ];
    }
}
