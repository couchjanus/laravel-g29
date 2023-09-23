<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

use App\Models\Product;


class ProductForm extends Form
{
    public ?Product $product;

    #[Rule('required|min:5')]
    public $name;

    #[Rule('required|min:10')]
    public $description;

    public $status;

    #[Rule('required|integer')]
    public $category_id;
    #[Rule('required|integer')]
    public $brand_id;

    #[Rule('image|max:1024')]
    public $cover;
    #[Rule('required|decimal:2')]
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


        $validatedData = $this->validate([

        ]);

        $this->status = $this->status ? 1 : 0;

        if($this->cover == null) {
            session()->flash('error', "The cover field is required!");
            return;
        }
        else if ($this->cover->getClientOriginalName()) {
            $validatedData['filename'] = $this->cover->store('products', 'public');

            $this->cover = $validatedData['filename'];

        }

        $this->product->update(
            $this->all()
        );

        session()->flash('success', "Product updated successfully!");
    }

    public function store()
    {
        $this->status = $this->status ? 1 : 0;

        if($this->cover == null) {
            session()->flash('error', "The cover field is required!");
            return;
        }

        $validatedData = $this->validate([

        ]);

        $validatedData['filename'] = $this->cover->store('products', 'public');

        $this->cover = $validatedData['filename'];

        Product::create($this->all());
        session()->flash('success', "Product created successfully!");
    }

}
