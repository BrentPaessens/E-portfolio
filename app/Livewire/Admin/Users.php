<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Traits\SweetAlertTrait;
use Livewire\WithPagination;


class Users extends Component
{
    use WithPagination;
    use SweetAlertTrait;

    // filter and pagination
    public $search;
    public $status;
    public $perPage = 10;

    // show/hide the modal
    public $showModal =false;

    // toggle active/inactive user
    public function toggleActive($userId)
    {
        $user = User::find($userId);
        $user->active = !$user->active;
        $user->save();

        if ($user->active) {
            $this->swalToast("<b><i>{$user->name}</i></b> has been activated",
                'info', [
                    'icon' => 'success'
                ]);
        } else {
            $this->swalToast("<b><i>{$user->name}</i></b> has been deactivated",
                'info', [
                    'icon' => 'info'
                ]);
        }

    }
    // toggle admin
    public function toggleAdmin($userId)
    {
        $user = User::find($userId);
        $user->admin = !$user->admin;
        $user->save();

        if ($user->admin) {
            $this->swalToast("<b><i>{$user->name}</i></b> has been granted admin rights",
                'info', [
                    'icon' => 'success'
                ]);
        } else {
            $this->swalToast("<b><i>{$user->name}</i></b> has been removed from admin rights",
                'info', [
                    'icon' => 'info'
                ]);
        }
    }

    public function updated($property, $value)
    {
        // $property: The name of the current property being updated
        // $value: The value about to be set to the property

        if (in_array($property, ['perPage', 'status', 'search']))
            $this->resetPage();
    }

    #[Layout('layouts.eventshop', ['title' => 'Users', 'description' => 'Manage users',])]
    public function render()
    {
        $query= User::orderBy('name')
            ->searchUser($this->search);
        $users = $query
            ->paginate($this->perPage);
        return view('livewire.admin.users-advanced', compact('users'));
    }
}
