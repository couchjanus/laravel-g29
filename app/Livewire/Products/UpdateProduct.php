<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Livewire\Forms\ProductForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Product;
use Livewire\WithFileUploads;

#[Title('Edit Product')]
#[Layout('layouts.admin')]
class UpdateProduct extends Component
{
    use WithFileUploads;
    public ProductForm $form;

    public $title = "Edit Product";

    public function mount(Product $product) {
        $this->form->setProduct($product);
    }

    public function save() {
        $this->form->update();
        return $this->redirect('/products');
    }

    public function render()
    {
        return view('livewire.products.update-product');
    }
}
