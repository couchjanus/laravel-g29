<?php

namespace App\Livewire\App;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Shopping Cart')]
#[Layout('layouts.front')]
class ShoppingCart extends Component
{
    public $cartItems = [];

    protected $listeners = ['cartUpdated' => '$refresh'];


    public function remove($id)
    {
        \Cart::remove($id);
        $this->dispatch('refresh'); // update

        session()->flash('success', "Item has removed from cart!");
    }

    public function clear()
    {
        \Cart::clear();
        $this->dispatch('refresh'); // update

        session()->flash('success', "All items removed from cart!");
    }


    public function render()
    {
        $this->cartItems = \Cart::getContent()->toArray();
        return view('livewire.app.shopping-cart');
    }
}
