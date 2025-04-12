<?php

namespace App\Livewire;

use App\Livewire\Forms\OrderForm;
use App\Mail\OrderConfirmation;
use App\Models\Evenement;
use App\Traits\SweetAlertTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Helpers\Cart;
use Livewire\Attributes\Layout;
use Mail;
use Illuminate\Mail\Mailables\Address;

class Basket extends Component
{
    use SweetAlertTrait;

    // all public properties
    public $backorder = [];
    public $totalQty;
    public $showModal = false;
    public OrderForm $form;

    // show the checkout form when 'checkout' button is clicked
    public function checkoutForm()
    {
        $this->form->reset();
        $this->resetErrorBag();
        $this->showModal = true;
    }

    //order has been made modal will be closed
    public function checkout()
    {
        // validate the form
        $this->form->validate();
        // hide the modal
        $this->showModal = false;
        // update the stock
        foreach (Cart::getEvents() as $event) {
            $eventModel = Evenement::find($event['id']);
            if ($eventModel) {
                $eventModel->stock -= $event['qty'];
                $eventModel->save();
            }
        }
        // send confirmation email to the user
        $this->form->sendConfirmMail();
        // reset the form, backorder array and error bag
        $this->form->reset();
        $this->reset('backorder');
        $this->resetErrorBag();
        // empty the cart
        Cart::empty();
        $this->dispatch('basket-updated');
        // show a confirmation message
        $this->swalToast("Thank you for your order.<br>you'll soon receive a confirmation email with the details of your purchase.");
    }

    public function mount()
    {
        $this->totalQty = Cart::getTotalQty();
    }

    public function emptyBasket()
    {
        Cart::empty();
        $this->dispatch('basket-updated');
    }

    public function decreaseQty(Evenement $event)
    {
        Cart::decrease($event);
        $this->dispatch('basket-updated');
    }

    public function increaseQty(Evenement $event)
    {
        Cart::add($event);
        $this->dispatch('basket-updated');
    }


    #[On('basket-updated')]
    #[Layout('layouts.eventshop', ['title' => 'Your shopping basket', 'description' => 'Your shopping basket',])]
    public function render()
    {
        return view('livewire.basket', [
            'totalQty' => $this->totalQty,
            'totalPrice' => Cart::getTotalPrice(),
            'events' => Cart::getEvents(),
        ]);
    }
}
