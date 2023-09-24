<?php

namespace App\Livewire\App;

use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = ['cart_updated' => 'render' ];

    public function render()
    {
        $cart_count = \Cart::getContent()->count();
        return view('livewire.app.cart-counter', compact('cart_count'));
    }
}
