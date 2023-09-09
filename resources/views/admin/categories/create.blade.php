<x-admin-layout>
    <x-slot name="header">
       <div class="flex justify-between"> 
        <h1 class="text-3xl text-black pb-6">
            {{ $title }}
        </h1>

        <a href="{{ route('categories.create')}}"><button class="bg-blue-300 hover:bg-blue-400 text-white font-bold py-2 px-5 rounded-l">Create New</button></a>
        </div>
    </x-slot>
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-plus mr-3"></i> Add New Category
        </p>
        <div class="bg-white overflow-auto">
            <form action="{{ route('categories.store') }}" method="POST"  class="w-full max-w-sm">
            @csrf

            <div class="mb-4">
                
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Category name:
                    </label>
               
    
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name">
 
            </div>
            
            <div class="mb-4">
                
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        Category description:
                    </label>
                
                <textarea name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    
                
            </div>



                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3"></div>
                    <label class="md:w-2/3 block text-gray-500 font-bold">
                    <input class="mr-2 leading-tight" type="checkbox" name="status">
                    <span class="text-sm">
                        Category status
                    </span>
                    </label>
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