<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

use App\Models\Product;


class ProductForm extends Form
{
    public ?Product $product;

    public $file, $title;

    #[Rule('required|min:5')]
    public $name;
    #[Rule('required|min:10')]
    public $description;

    public $status;

    public $category_id;
    public $brand_id;

    #[Rule('image|max:1024')]
    public $cover;

    public $price;

    public function setProduct(Product $product)
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->category_id = $product->category_id;
        $this->brand_id = $product->brand_id;
        $this->status = $product->status;
        $this->cover = $product->cover;

    }

    public function update()
    {
        $this->product->update(
            $this->all()
        );
    }

    public function store()
    {

        $validatedData = $this->validate([
            'title' => 'required',
            'file' => 'required'
        ]);

        $validatedData['name'] = $this->cover->store('products', 'public');

        $this->cover = $validatedData['name'];

        Product::create($this->all());
    }

}
