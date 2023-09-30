<x-front-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Checkout: Complete Your shipping and payment.') }}</h2>
</x-slot>

<div class="antialiased">
   <div class="mx-4 py-4">
 <x-app.breadcrumbs :section="'Shop'" :url="'shopping.cart'" :current="'Checkout'"/>
 <form action="{{ route('checkout.place.order') }}" method="POST"> @csrf
   <div class="flex-1">
    <div class="my-4 mt-6 -mx-2 lg:flex">
      <div class="lg:px-2 lg:w-1/2">
       <div class="p-4 bg-gray-100 rounded-full"><h1 class="ml-2 font-bold uppercase">Shipping & Billing Information</h1> </div>
          <div>
           <div class="flex items-center justify-between mt-4">
             <div class="w-full px-10">
              <x-label for="first_name" value="{{ __('First Name') }}" />
              <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" class="@error('first_name') is-invalid @enderror" :value="old('first_name')" required autofocus autocomplete="first_name" />
                @error('first_name')<div class="alert">{{ $message }}</div> @enderror
             </div>

            <div class="w-full px-10">
                <x-label for="last_name" value="{{ __('Last Name') }}" />
                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" class="@error('last_name') is-invalid @enderror" :value="old('last_name')" required autofocus autocomplete="last_name" />
                @error('last_name')<div class="alert">{{ $message }}</div> @enderror
            </div>
          </div>
        <div class="flex items-center justify-between mt-4">
            <div class="w-full px-10">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ auth()->user()->email }}" disabled />
            </div>

<div class="w-full px-10">
  <x-label for="address" value="{{ __('Address') }}" />
  <x-input id="address" class="mt-1 w-full block" type="text" name="address" class="@error('address') is-invalid @enderror" :value="old('address')" required autofocus autocomplete="address" />
@error('address')<div class="alert">{{ $message }}</div>@enderror
</div>
</div>
<div class="flex items-center justify-between mt-4">
  <div class="w-full px-10">
    <x-label for="city" value="{{ __('City') }}" />
    <x-input id="city" class="block mt-1 w-full" type="text" name="city" class="@error('city') is-invalid @enderror" :value="old('city')" required autofocus autocomplete="city" />
@error('city')<div class="alert">{{ $message }}</div> @enderror </div>

<div class="w-full px-10">
 <x-label for="country" value="{{ __('Country') }}" />
 <x-form.country name="country" />
</div>
</div>
<div class="flex items-center justify-between mt-4">
 <div class="w-full px-10">
   <x-label for="post_code" value="{{ __('Post code') }}" />
   <x-input id="post_code" class="block mt-1 w-full" type="text" name="post_code" class="@error('post_code') is-invalid @enderror" :value="old('post_code')" required autofocus autocomplete="post_code" />
@error('post_code')<div class="alert">{{ $message }}</div> @enderror
</div>

<div class="w-full px-10">
 <x-label for="phone_number" value="{{ __('Phone number') }}" />
 <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" class="@error('phone_number') is-invalid @enderror" :value="old('phone_number')" required autofocus autocomplete="phone_number" />
@error('phone_number')<div class="alert">{{ $message }}</div> @enderror
</div>
</div>
<div class="p-4">
 <p class="mb-4 italic">If you have some information for the seller you can leave them in the box below</p>
<textarea class="w-full h-24 p-2 bg-gray-100 rounded" name="notes"></textarea>
</div>
</div>
</div>
<div class="lg:px-2 lg:w-1/2">
  <div class="p-4 bg-gray-100 rounded-full"> <h1 class="ml-2 font-bold uppercase">Your Order</h1>  </div>
  <div class="p-4"><p class="mb-6 italic">Shipping and additionnal costs are calculated based on values you have entered</p><div class="flex justify-between border-b"><div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800"> Total cost: </div><div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">{{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }}€</div></div>
<div class="flex justify-between pt-4 border-b"> <a href="#"> <button class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-indigo-800 rounded-full shadow item-center hover:bg-indigo-700 focus:shadow-outline focus:outline-none"> <span class="ml-2 mt-5px">Place Order</span> </button> </a> </div></div></div></div></div>

</form>


        </div>
      </div>
    </div>
  </div>

</x-front-layout>
