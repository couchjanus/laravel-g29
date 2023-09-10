<x-admin-layout>
    <x-slot name="header">
       <div class="flex justify-between"> 
        <h1 class="text-3xl text-black pb-6">
            {{ $title }}
        </h1>

        <a href="{{ route('brands.create')}}"><button class="bg-blue-300 hover:bg-blue-400 text-white font-bold py-2 px-5 rounded-l">Create New</button></a>
        </div>
    </x-slot>

      <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> {{ $title }}
        </p>
        <div class="bg-white overflow-auto">
            @if(count($brands) > 0)
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Id</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                       
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Deleted</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                    </tr>
                </thead>

                <tbody class=text-gray-700>

                @foreach ($brands as $brand)
                    <tr>
                        <td class="w-1/3 text-left py-3 px-4">{{ $brand->id }}</td>
                        <td class="w-1/3 text-left py-3 px-4">{{ $brand->name }}</td>
                        
                        <td class="w-1/3 text-left py-3 px-4">{{ $brand->deleted_at }}</td>
                        <td class="text-left py-3 px-4">
                            <div class="inline-flex">
                                <form method="POST" class="inline-form" action="{{ route('brands.restore', $brand->id) }}">
                                    @csrf <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-r">Restore</button>
                                </form>
                                
                                <form method="POST" class="inline-form" action="{{ route('brands.force', $brand->id) }}">
                                    @csrf  @method('DELETE') <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-r">Delete</button>
                                </form> 
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else <p>No items yet</p>
            @endif
        </div>
    </div>

</x-admin-layout>
