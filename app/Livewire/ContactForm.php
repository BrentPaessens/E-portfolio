<?php

namespace App\Livewire;

use App\Traits\SweetAlertTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Mail\ContactMail;
use Illuminate\Mail\Mailables\Address;
use Mail;

class ContactForm extends Component
{
    use SweetAlertTrait;

    // public properties
    #[Validate('required|min:2|max:50')]
    public $name;
    #[Validate('required|email')]
    public $email;
    #[Validate('required|min:10|max:500')]
    public $message;
    public $canSubmit = false;

    // disable submit button until all fields are valid
    public function updated($propertyName, $propertyValue)
    {
        $this->canSubmit = $this->getErrorBag()->isEmpty();
    }

    // send email
    public function sendMail()
    {
        $this->validate();
        // sending mail
        $template = new ContactMail([
            'fromName' => 'The Event Shop - Info',
            'fromEmail' => 'info@eventshop.com',
            'subject' => 'The Event Shop',
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);
        $to = new Address($this->email, $this->name);
        Mail::to($to)->send($template);
        // show pop-up message
        $this->swalToast(
            "<p class='font-bold mb-2'>Dear $this->name,</p>
            <p>Thank you for your message.<br>We'll contact you as soon as possible.</p>",
            'info',
        );
        // reset all public properties
        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
