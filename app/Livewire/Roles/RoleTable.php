<?php

namespace App\Livewire\Roles;

use RamonRietdijk\LivewireTables\Livewire\LivewireTable;

use Illuminate\Database\Eloquent\Model;

use RamonRietdijk\LivewireTables\Columns\Column;
use RamonRietdijk\LivewireTables\Columns\DateColumn;
use Spatie\Permission\Models\Role;

class RoleTable extends LivewireTable
{
    protected string $model = Role::class;

    protected function columns(): array
    {
        return [

            Column::make(__('Role Name'), 'name')
                ->sortable()
                ->searchable(),

            DateColumn::make(__('Created At'), 'created_at')
                ->sortable()
                ->format('F jS, Y'),

            Column::make(__('Actions'), function (Model $model): string {
                return '<a class="bg-green-300 hover:bg-green-500 text-white font-bold py-2 px-4 rounded-l" href="/admin/roles/'.$model->getKey().'/edit">Edit</a>';
            })
                ->clickable(false)
                ->asHtml(),
        ];
    }

    public function link(Model $model): ?string
    {
        return route('roles.edit', ['role' => $model->getKey()]);
    }

}
