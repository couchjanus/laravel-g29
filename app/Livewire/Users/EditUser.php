<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
// use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Livewire\Forms\UserForm;
use Spatie\Permission\Models\Role;

#[Title('Edit User')]
#[Layout('layouts.admin')]
class EditUser extends Component
{
    public User $user;

    public UserForm $form;

    public $id, $name, $email, $password;

    public $title = "Edit User";

    public $roles;


    public function mount(User $user)
    {
        $this->roles = Role::pluck('name', 'name')->all();
        // dd($this->roles);


        $this->form->setUser($user);


        // $this->user = $user;

        // $this->fill(
        //     $user->only('name', 'email', 'password'),
        // );
    }

    public function update()
    {
        $this->form->update();

        // $user = User::findOrFail($this->id);

        // $user->update(
        //     [
        //         'name' => $this->name,
        //         'email' => $this->email,
        //         'password' => $this->password,
        //     ]
        //     );
        // $user->update(
        //     $this->form->all()
        // );
        return $this->redirect('/users');
    }

    public function render()
    {
        return view('livewire.users.edit-user');
    }
}
