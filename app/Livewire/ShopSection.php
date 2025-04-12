<?php

namespace App\Livewire;

use App\Helpers\Cart;
use App\Models\Evenement;
use App\Models\Genre;
use Http;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\SweetAlertTrait;

class ShopSection extends Component
{
    use sweetAlertTrait;
    // public properties
    public $filter;
    public $genre = '%';
    public $price;
    public $priceMin, $priceMax;

    use WithPagination;
    // public properties
    public $perPage = 6;
    public $loading = 'Please wait...';
    public $selectedEvent;
    public $showModal = false;

    public function updated($property, $value)
    {
        // $property: The name of the current property being updated
        // $value: The value about to be set to the property
        if (in_array($property, ['perPage', 'filter', 'genre', 'price']))
            $this->resetPage();
    }

    /* modal where you can see how much tickets are left with also the location*/
    public function showInfo(Evenement $event)
    {
        $this->selectedEvent = $event;
        $this->showModal = true;
    }

    /* creating max and min for the price*/
    public function mount()
    {
        $this->priceMin = ceil(Evenement::min('prijs'));
        $this->priceMax = ceil(Evenement::max('prijs'));
        $this->price = $this->priceMax;
    }

    /* pop-up when event is added to the basket */
    public function addToBasket(Evenement $event)
    {
        Cart::add($event);
        $this->dispatch('basket-updated');
        $this->swalToast(
            "The event <b><i>{$event->naam}</i></b> has been added to your shopping basket",
            'success', [
            'icon' => 'success',
            'position' => 'top-start',
        ]);
    }

    #[Layout('layouts.eventshop', ['title' => 'Shop', 'description' => 'Welcome to our shop'])]
    public function render()
    {
        sleep(2);
        $allGenres = Genre::has('evenements')
            ->withCount('evenements')
            ->orderBy('naam')
            ->get();
        /* sort by name in the database and title*/
        $events = Evenement::orderBy('naam')
            ->where([
                ['naam', 'like', "%{$this->filter}%"],
                ['genre_id', 'like', $this->genre],
                ['prijs', '<=', $this->price]
            ])
            ->paginate($this->perPage);
        return view('livewire.shop-section', compact('events', 'allGenres'));
    }
}
