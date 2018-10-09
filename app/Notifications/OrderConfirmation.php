<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderConfirmation extends Notification
{
    use Queueable;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {

        //Auth::user()->notify(new OrderConfirmation($order));

        $confirm_url = url('/order/confirm/' . $this->order);
        $cancel_url  = url('/order/cancel/' . $this->order);

        return (new MailMessage)
            ->subject(' Order Confirmation')
            ->markdown('mail.order.comfirm' , [
                '$confirm_url' => $confirm_url ,
                'cancel_url'   => $cancel_url ,
                'order'        => $this->order ,
            ]);

    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
