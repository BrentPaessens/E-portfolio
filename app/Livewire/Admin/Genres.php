<?php

namespace App\Livewire\Admin;

use App\Models\Genre;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Traits\SweetAlertTrait;

class Genres extends Component
{
    use SweetAlertTrait;

    // sort properties
    public $sortColumn = 'name';
    public $sortOrder = 'asc';

    #[Validate('required|min:3|max:30|unique:genres,name',
        attribute: 'name for this genre',
    )]
    public $newGenre;

    #[Validate([
        'editGenre.name' => 'required|min:3|max:30|unique:genres,name',
    ], as: [
        'editGenre.name' => 'name for this genre',
    ])]
    public $editGenre = ['id' => null, 'name' => null];

    // copy the selected genre to $editGenre
    public function edit(Genre $genre)
    {
        $this->editGenre = [
            'id' => $genre->id,
            'name' => $genre->name,
        ];
    }

    // update the genre
    public function update(Genre $genre)
    {
        $this->editGenre['name'] = trim($this->editGenre['name']);
        // if the name is not changed, do nothing
        if(strtolower($this->editGenre['name']) === strtolower($genre->name)) {
            $this->resetValues();
            return;
        }
        $this->validateOnly('editGenre.name');
        $oldName = $genre->name;
        $genre->update([
            'name' => trim($this->editGenre['name']),
        ]);
        $this->resetValues();
        $this->swalToast("The genre <b><i>$oldName</i></b> has been updated to <b><i>$genre->name</i></b>");
    }

    // delete a genre
    public function delete(Genre $genre)
    {
        $this->swalConfirm(
            '',
            "Are you sure you want to delete the genre <b><i>$genre->name</i></b>?",
            'white',
            'delete-genre',
            $genre->id
        );
    }

    // delete genre is confirmed
    #[On('delete-genre')]
    public function deleteConfirmed($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        $this->swalToast("The genre <b><i>$genre->name</i></b> has been deleted");
    }

    // reset all the values and error messages
    public function resetValues()
    {
        $this->reset('newGenre', 'editGenre');
        $this->resetErrorBag();
    }

    // create a new genre
    public function create()
    {
        // validate the new genre name
        $this->validateOnly('newGenre');
        // create the genre
        $genre = Genre::create([
            'name' => trim($this->newGenre),
        ]);
        // reset $newGenre
        $this->resetValues();
        // show a success toast
        $this->swalToast("The genre <b><i>$genre->name</i></b> has been added");
    }

    public function resort($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortOrder = $this->sortOrder === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortColumn = $column;
            $this->sortOrder = 'asc';
        }
    }

    #[Layout('layouts.eventshop', ['title' => 'Genres', 'description' => 'Manage the genres of your vinyl records',])]
    public function render()
    {
        $genres = Genre::withCount('evenements')
            ->orderBy($this->sortColumn, $this->sortOrder)
            ->get();
        return view('livewire.admin.genres', compact('genres'));
    }
}
