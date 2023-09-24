<?php

namespace App\Livewire\App;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Product;
use Livewire\WithPagination;


#[Title('Home Page')]
#[Layout('layouts.front')]
class HomePage extends Component
{
    use WithPagination;

    public $perPage = 10;

    public function render()
    {
        $products = Product::paginate($this->perPage);
        return view('livewire.app.home-page', ['products' => $products]);
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'image' => $product->cover,
            ]
            ]);
        $this->dispatch('refresh');

    }
}
