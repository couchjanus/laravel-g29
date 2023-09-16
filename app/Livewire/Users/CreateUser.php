<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Create New User')]
class CreateUser extends Component
{
    public $title = "Create New User";

    public $name, $email, $password;


    public function save()
    {
        $user = User::create(['name' => $this->name, 'email' => $this->email, 'password' => Hash::make($this->password)]);
        return redirect()->to("/users");
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.users.create-user', ['title' => $this->title])->with(['status' => true]);
    }
}
