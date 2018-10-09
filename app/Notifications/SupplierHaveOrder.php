<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SupplierHaveOrder extends Notification
{
    use Queueable;


    public function __construct()
    {

    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {

        //Auth::user()->notify(new OrderConfirmation($order));

        return (new MailMessage)
            ->subject(' You have a new order')
            ->markdown('mail.order.supplier_new_order' , []);

    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
