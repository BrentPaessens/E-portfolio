<?php

namespace App\Livewire\Admin;

use App\Models\Evenement;
use App\Models\Genre;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Livewire\Forms\EventForm;
use App\Traits\SweetAlertTrait;
use Livewire\WithFileUploads;


class Events extends Component
{
    use WithPagination;
    use SweetAlertTrait;
    use WithFileUploads;

    // filter and pagination
    public $search;
    public $noStock = false;
    public $noCover = false;
    public $perPage = 5;
    // show/hide the modal
    public $showModal =false;
    public $cover;

    public EventForm $form;

    // reset the paginator
    public function updated($propertyName, $propertyValue)
    {
        // reset if the $search,  $noStock or $perPage property has changed (updated)
        if (in_array($propertyName, ['search', 'noStock', 'perPage']))
            $this->resetPage();
    }

    public function deleteEvent(Evenement $event)
    {
        $event->delete();
        $this->swalToast("The event <b><i>{$event->naam}</i></b> has been deleted",
            'info', [
                'icon' => 'info'
            ]);
    }

    // opens the modal to create new event
    public function newEvent()
    {
        $this->form->reset();
        $this->resetErrorBag();
        $this->cover = null; // Reset the cover property
        $this->showModal = true;
    }

    public function createEvent()
    {
        $this->validate([
            'cover' => 'image|max:1024', // 1MB Max
        ]);
        $coverPath = $this->cover->store('covers', 'public');
        $this->form->cover = $coverPath;

        $this->form->create();
        $this->showModal = false;
        $this->swalToast("The event <b><i>{$this->form->name}</i></b> has been added", 'success', [
            'icon' => 'success'
        ]);
    }
    //open modal to edit the event
    public function editEvent(Evenement $event)
    {
        $this->resetErrorBag();
        $this->form->fill($event);
        $this->showModal = true;
    }

    public function updateEvent(Evenement $event)
    {
        $this->form->update($event);
        $this->showModal = false;
        $this->swalToast("The event <b><i>{$this->form->name}</i></b> has been updated",
            'info', [
                'icon' => 'success'
            ]);
    }

    #[Layout('layouts.eventshop', ['title' => 'Events', 'description' => 'Manage the events of all events',])]
    public function render()
    {
        // filter by $search
        $query = Evenement::orderBy('naam')
            ->orderBy('naam')
            ->searchEvent($this->search);
        // only if $noStock is true, filter the query further, else, skip this step
        if ($this->noStock)
            $query->where('stock', false);
        // paginate the $query
        $events = $query
            ->paginate($this->perPage);
        // get the genres for the dropdown in the modal
        $genres = Genre::orderBy('name')->get();
        return view('livewire.admin.events', compact('events', 'genres'));
    }
}
