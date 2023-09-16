<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\User;

class UserForm extends Form
{
    public ?User $user;

    #[Rule('required|string|max:255')]
    public $name  = '';

    #[Rule('required|string|email|max:255|unique:users')]
    public $email  = '';

    #[Rule('required|string|min:8')]
    public $password  = '';


    public function setUser(User $user)
    {
        $this->user = $user;

        $this->name = $user->name;

        $this->email = $user->email;
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
    }


}
