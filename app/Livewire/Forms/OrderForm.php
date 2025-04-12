<?php

namespace App\Livewire\Forms;

use App\Helpers\Cart;
use App\Mail\OrderConfirmation;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Mail;

class OrderForm extends Form
{
    #[Validate('required')]
    public $name = null;
    #[Validate('required')]
    public $email = null;
    #[Validate('required')]
    public $city = null;
    #[Validate('required|numeric')]
    public $zip = null;
    #[Validate('required')]
    public $country = null;

    public $message;

    // send email about the order
    public function sendConfirmMail()
    {
        $message = '<p>Thank you for your order.<br></p>';
        $message .= '<ul>';
        foreach (Cart::getEvents() as $event) {
            $message .= "<li>{$event['qty']} x {$event['naam']} - &euro; {$event['prijs']}</li>";
        }
        $message .= '</ul>';
        $message .= "<p>Total price: &euro; " . Cart::getTotalPrice() . "</p>";

        $this->message = $message;

        $template = new OrderConfirmation([
            'fromName' => 'The Event Shop - Info',
            'fromEmail' => 'info@eventshop.com',
            'subject' => 'Order Confirmation',
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);
        Mail::to(auth()->user())
            ->send($template);
    }
}

