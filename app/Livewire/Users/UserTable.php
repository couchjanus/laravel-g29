<?php

namespace App\Livewire\Users;

use Livewire\Component;
use RamonRietdijk\LivewireTables\Livewire\LivewireTable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Enumerable;
use RamonRietdijk\LivewireTables\Actions\Action;
use RamonRietdijk\LivewireTables\Columns\BooleanColumn;
use RamonRietdijk\LivewireTables\Columns\Column;
use RamonRietdijk\LivewireTables\Columns\DateColumn;
use RamonRietdijk\LivewireTables\Columns\ImageColumn;
use RamonRietdijk\LivewireTables\Columns\SelectColumn;
use RamonRietdijk\LivewireTables\Filters\BooleanFilter;
use RamonRietdijk\LivewireTables\Filters\DateFilter;
use RamonRietdijk\LivewireTables\Filters\SelectFilter;


class UserTable extends LivewireTable
{
    protected string $model = User::class;
    // public function render()
    // {
    //     return view('livewire.users.user-table');
    // }

    protected function columns(): array
    {
        return [

            Column::make(__('User Name'), 'name')
                ->sortable()
                ->searchable(),


            Column::make(__('Email'), 'email')
                ->sortable()
                ->searchable(),


            BooleanColumn::make(__('Status'), 'status')
                ->sortable(),

            DateColumn::make(__('Created At'), 'created_at')
                ->sortable()
                ->format('F jS, Y'),

            Column::make(__('Actions'), function (Model $model): string {
                return '<a class="bg-green-300 hover:bg-green-500 text-white font-bold py-2 px-4 rounded-l" href="/users/'.$model->getKey().'/edit">Edit</a>';
            })
                ->clickable(false)
                ->asHtml(),
        ];
    }

    public function link(Model $model): ?string
    {
        return route('users.edit', ['user' => $model->getKey()]);
    }

    protected function actions(): array
    {
        return [
            Action::make(__('Active All'), 'active_all', function (): void {
                User::query()->update(['status' => true]);
            })->standalone(),

            Action::make(__('Active'), 'active', function (Enumerable $models): void {
                $models->each(function (User $user): void {
                    $user->status = true;
                    $user->save();
                });
            }),

            Action::make(__('Not Active'), 'not_active', function (Enumerable $models): void {
                $models->each(function (User $user): void {
                    $user->status = false;
                    $user->save();
                });
            }),
        ];
    }

}
