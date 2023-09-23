<x-admin-layout>
    <x-slot name="header">
       <div class="flex justify-between">
        <h1 class="text-3xl text-black pb-6">
            {{ $title }}
        </h1>

        <a href="{{ route('brands.index')}}"><button class="bg-blue-300 hover:bg-blue-400 text-white font-bold py-2 px-5 rounded-l">All Brands</button></a>
        </div>
    </x-slot>
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-plus mr-3"></i> Add New Brand
        </p>
        <div class="bg-white overflow-auto">
            <form action="{{ route('brands.store') }}" method="POST"  class="w-full max-w-sm">
            @csrf

            <div class="mb-4">

                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Brand name:
                    </label>


                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" value="{{ old('name') }}">

                    @error('name')
                        <div class="alert text-red-500">{{ $message }}</div>
                    @enderror

            </div>

            <div class="mb-4">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        Brand description:
                    </label>

                <textarea name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline">
                {{ old('description') }}
                </textarea>
                @error('description')
                        <div class="alert text-red-500">{{ $message }}</div>
                @enderror


            </div>

                <div class="flex items-center justify-between">

                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Add new
                    </button>

                </div>
            </form>
        </div>
    </div>

</x-admin-layout>
