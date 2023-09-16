<div>
    {{ $title }}
    <form wire:submit="update">

        <label for="name">User Name:</label>
        <input id="name" wire:model="form.name">
        <div>
        @error('form.name') <span class="error">{{ $message }} @enderror</span>
        </div>
        <label for="email">User Email:</label>
        <input id="email" wire:model="form.email">
        <div>
        @error('form.email') <span class="error">{{ $message }} @enderror</span>
        </div>
        <label for="password">User Password:</label>
        <input id="password" wire:model="form.password">
        <div>
        @error('form.password') <span class="error">{{ $message }} @enderror</span>
        </div>
        <button type="submit">Update User</button>
    </form>
</div>
