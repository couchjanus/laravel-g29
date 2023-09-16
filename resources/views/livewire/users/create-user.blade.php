<div>
    {{ $title }}

    {{ $status }}

    <form wire:submit="save">
        <label for="name">User Name:</label>
        <input id="name" wire:model="name">
        <label for="email">User Email:</label>
        <input id="email" wire:model="email">
        <label for="password">User Password:</label>
        <input id="password" wire:model="password">
        <button type="submit">Create User</button>
    </form>
</div>
