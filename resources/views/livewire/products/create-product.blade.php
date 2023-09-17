<div class="md:flex">

    <x-slot name="header">
        <div class="flex justify-between">
            <h1 class="text-3xl text-black pb-6">{{ $title }}</h1> <a href="{{ route('products.index') }}"><button class="bg-blue-300 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded-l">All products</button></a>
        </div>
    </x-slot>

<form wire:submit="save">

  <div class="md:flex mb-8">

    <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">

      <div class="md:flex mb-4">

        <div class="md:flex-1 md:pr-3">
          <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Product Name</label>
          <input class="w-full shadow-inner p-4 border-0" type="text" wire:model="form.name">
          <div>@error('form.name') <span class="error">{{ $message }}</span> @enderror</div>
        </div>

        <div class="md:flex-1 md:pl-3">
          <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Product Price</label>
          <input class="w-full shadow-inner p-4 border-0" type="text" wire:model="form.price">
          <div>
            @error('form.price') <span class="error">{{ $message }}</span> @enderror
          </div>
        </div>

    </div>

    <div class="md:flex mb-4">

      <div class="md:flex-1 md:pr-3">
        <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Product Brand</label>
        <select wire:model="form.brand_id">
            <option disabled>Select a brand...</option>
            @foreach (\App\Models\Brand::all() as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>
            @endforeach
        </select>
      </div>

      <div class="md:flex-1 md:pl-3">
        <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Product Category</label>

        <select wire:model="form.category_id">
            <option disabled>Select a category...</option>
            @foreach (\App\Models\Category::all() as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>
            @endforeach
        </select>
      </div>

    </div>

    <div class="md:flex mb-6">
      <div class="md:w-1/3">
        <legend class="uppercase tracking-wide text-sm">Description</legend>
      </div>
      <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
        <textarea class="w-full shadow-inner p-4 border-0" wire:model="form.description" rows="6"></textarea>
        <div>
          @error('form.description') <span class="error">{{ $message }}</span> @enderror
        </div>
      </div>
    </div>

    <div class="md:flex mb-6">
      <div class="md:w-1/3">
        <legend class="uppercase tracking-wide text-sm">Cover Image</legend>
        @if ($form->cover)
        <img src="{{ $form->cover->temporaryUrl() }}">
        @endif
      </div>
      <div class="md:flex-1 px-3 text-center">
        <div class="button bg-blue-700 hover:bg-blue-800 text-white mx-auto cusor-pointer relative">
          <input class="opacity-0 absolute pin-x pin-y" type="file" wire:model="form.cover">
            Upload Cover Image</div>
          <div>@error('form.cover') <span class="error">{{ $message }}</span> @enderror</div>
        </div>
      </div>

      <div class="md:flex mb-6">
        <label class="button text-gray-800 px-4 py-2"><input type="checkbox" wire:model="form.status"> Status</label>
      </div>

      <div class="md:flex mb-6">
        <button class="button text-white px-4 py-2 bg-green-300 hover:bg-green-500" type="submit">Create</button>
      </div>

    </div>
  </div>

</form>
</div>
