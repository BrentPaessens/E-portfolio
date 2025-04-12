<?php

namespace App\Livewire\Forms;


use App\Models\Evenement;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Http;
use Intervention\Image\Laravel\Facades\Image;
use Storage;

class EventForm extends Form
{
    public $id = null;
    // #[Validate('required', as: 'name of the event')]
    #[Validate]
    public $name = null;
    #[Validate('required|numeric|min:0', as: 'stock')]
    public $stock = null;
    #[Validate('required|numeric|min:0', as: 'price')]
    public $price = null;
    #[Validate('required|exists:genres,id', as: 'genre')]
    public $genre_id = null;
    #[Validate('required', as: 'location')]
    public $location = null;
    public $cover = null;

    protected function rules($isUpdate = false)
    {
        return [
            'name' => $isUpdate ? 'nullable' : 'required',
            'stock' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'genre_id' => 'required|exists:genres,id',
            'location' => 'required',
        ];
    }

    // create a new record
    public function create()
    {
        $this->validate($this->rules());
        Evenement::create([
            'genre_id' => $this->genre_id,
            'naam' => $this->name,
            'locatie' => $this->location,
            'prijs' => $this->price,
            'stock' => $this->stock,
            'image' => $this->cover,
        ]);
    }

    // update the selected record
    public function update(Evenement $event) {
        $this->validate($this->rules(true));
        $event->update([
            'stock' => $this->stock,
            'prijs' => $this->price,
            'genre_id' => $this->genre_id,
            'locatie' => $this->location,
        ]);
    }
}
