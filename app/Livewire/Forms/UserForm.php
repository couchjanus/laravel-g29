<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\User;
// use Spatie\Permission\Models\Role;

class UserForm extends Form
{
    public ?User $user;

    #[Rule('required|string|max:255')]
    public $name  = '';

    #[Rule('required|string|email|max:255|unique:users')]
    public $email  = '';

    #[Rule('required|string|min:8')]
    public $password  = '';

    // public $roles;

    public $selectedrole = NULL;

    public function setUser(User $user)
    {
        $this->user = $user;

        $this->name = $user->name;

        $this->email = $user->email;

        // $this->roles = Role::pluck('name', 'name')->all();
    }

    public function store()
    {
        User::create($this->only(['name', 'email']));
    }

    public function update()
    {
        $this->user->update(
            $this->all()
        );

        if ($this->selectedrole) {
            $this->user->assignRole($this->selectedrole);
        }

    }


}
