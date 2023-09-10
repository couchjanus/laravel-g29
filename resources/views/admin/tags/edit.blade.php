<x-admin-layout>
    <x-slot name="header">
       <div class="flex justify-between"> 
        <h1 class="text-3xl text-black pb-6">
            {{ $title }}
        </h1>

        <a href="{{ route('tags.create')}}"><button class="bg-blue-300 hover:bg-blue-400 text-white font-bold py-2 px-5 rounded-l">Create New</button></a>
        </div>
    </x-slot>

      <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> {{ $title }} {{ $tag->name }}
        </p>
        <div class="bg-white overflow-auto">
            
            <form class="p-10 bg-white shadow-xl" action="{{route('tags.update', $tag->slug)}}" method="POST"> @csrf @method('PUT')   

                <div>
                <lable class="block text-sm text-gray-600" for="name">Tag Name</label>
                <input class="w-full px-5 py-2 test-gray-700 bg-gray-100 rounded" id="name" name="name" value="{{$tag->name}}">
                </div>

                <div class="mt-6">
                    <button class="px-4 py-2 text-white bg-blue-800 rounded" type="sunmit">Update</button>
                </div>


            </form>
        </div>
      </div>

</x-admin-layout>
