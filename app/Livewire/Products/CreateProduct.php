<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Livewire\Forms\ProductForm;

// use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

use Livewire\WithFileUploads;

#[Title("Create New Product")]
#[Layout('layouts.admin')]
class CreateProduct extends Component
{
    use WithFileUploads;

    public ProductForm $form;

    public $title = "Create New Product";

    public function save()
    {
        $this->form->store();
        return $this->redirect('/products');
    }
    public function render()
    {
        return view('livewire.products.create-product');
    }
}
