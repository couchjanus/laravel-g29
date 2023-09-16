<x-admin-layout>
    <x-slot name="header">
    <div class="flex justify-between">
    <h1 class="text-3xl text-black pb-6">{{ $title }}</h1> <a href="{{ route('users.create') }}"><button class="bg-blue-300 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded-l">Create New</button></a>
    </div>
    </x-slot>
    <div class="w-full mt-12">
    <div class="bg-white overflow-auto"><livewire:users.user-table/></div>
    </div>
</x-admin-layout>
