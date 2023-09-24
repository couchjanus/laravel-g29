<x-slot name="header">

    <div class="flex justify-between m-4">

        <h1 class="text-3xl text-black pb-6">Shopping Cart</h1>

    </div>

</x-slot>

<div class="antialiased">

  <div class="mx-4 py-4">
    <div class="flex justify-center py-4 my-4">
        <div class="flex flex-col w-full p-8 text-grey-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
            <div class="flex-1">
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                  <thead>
                    <tr class="h-12 uppercase">
                      <th class="hidden md:table-cell"></th>
                      <th class="text-left">Product</th>
                      <th class="lg:text-right text-left pl-5 lg:pl-0">
                        <span class="lg:hidden" title="Quantity">Qtd</span>
                        <span class="lg:inline hidden">Quantity</span>
                      </th>
                     <th class="hidden text-right md:table-cell">Unit price</th>
                     <th class="text-right">Total price</th>
                     <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($cartItems as $item)

                    <tr>
                        <td class="hidden pb-4 md:table-cell">
                        <a href="#">
                        <img src="{{ asset(Storage::url($item['attributes']['image'])) }}" class="w-20 rounded" alt="Product Thumbnail">
                        </a>
                        </td>
                        <td>
                        <a href="#"><p class="mb-2 md:ml-4">{{ $item['name'] }}</p></a>
                        </td>

                        <td class="justify-center md:justify-end md:flex mt-6">
                        <div class="w-30 h-10">
                        <div class="relative flex flex-row w-full h-8">
                        {{-- cart update --}}
                        <livewire:app.cart-update :item="$item" :key="$item['id']"></livewire:app.cart-update>
                        </div>
                        </div>
                        </td>

                        <td class="hidden text-right md:table-cell">
                          <span class="text-sm lg:text-base font-medium">
                          {{ $item['price'] }}
                          </span>

                        </td>

                        <td class="text-right">
                          <span class="text-sm lg:text-base font-medium">
                          {{ $item['price'] * $item['quantity'] }}
                          </span>

                        </td>

                        <td class="text-right">
                         <button class="mr-2 mt-1 lg:mt-2" wire:click.prevent="remove({{ $item['id'] }})">delete</button>
                        </td>
                    </tr>

                    @empty

                    <h2>Not items yet</h2>

                    @endforelse

                  </tbody>
                </table>

                <hr class="pb-6 mt-6">

                <div class="my-4 mt-6 -mx-2 lg:flex">
                  <div class="lg:px-2 lg:w-1/2"></div>

                  <div class="lg:px-2 lg:w-1/2">
                    <div class="p-4 bg-grey-100 rounded-full">
                      <h2 class="ml-2 font-bold uppercase">Order Detail</h2>
                    </div>
                    <div class="p-4">
                      <p></p>
                      <div class="flex justify-between border-b">
                        <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-grey-800">
                        Subtotal
                        </div>
                        <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-grey-900">
                         {{ \Cart::getSubTotal() }}
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
            </div>

        </div>
    </div>
  </div>



</div>
