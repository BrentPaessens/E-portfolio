<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Helpers\Cart;
use Livewire\Attributes\On;

class MiniBasket extends Component
{
    public $totalQty;

    public function mount()
    {
        $this->totalQty = Cart::getTotalQty();
    }

    #[On('basket-updated')]
    public function render()
    {
        return view('livewire.partials.mini-basket', ['totalQty' => $this->totalQty]);
    }
}
