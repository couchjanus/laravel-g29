<?php

namespace App\Livewire\Products;

use RamonRietdijk\LivewireTables\Livewire\LivewireTable;
use App\Models\Product;
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


class ProductTable extends LivewireTable
{
    protected string $model = Product::class;

    protected function columns(): array
    {
        return [

            Column::make(__('User Name'), 'name')
                ->sortable()
                ->searchable(),


            Column::make(__('Price'), 'price')
                ->sortable()
                ->searchable(),


            BooleanColumn::make(__('Status'), 'status')
                ->sortable(),

            DateColumn::make(__('Created At'), 'created_at')
                ->sortable()
                ->format('F jS, Y'),

            Column::make(__('Actions'), function (Model $model): string {
                return '<a class="bg-green-300 hover:bg-green-500 text-white font-bold py-2 px-4 rounded-l" href="/products/'.$model->getKey().'/edit">Edit</a>';
            })
                ->clickable(false)
                ->asHtml(),
        ];
    }

    public function link(Model $model): ?string
    {
        return route('products.edit', ['product' => $model->getKey()]);
    }

    protected function actions(): array
    {
        return [
            Action::make(__('Active All'), 'active_all', function (): void {
                Product::query()->update(['status' => true]);
            })->standalone(),

            Action::make(__('Active'), 'active', function (Enumerable $models): void {
                $models->each(function (Product $product): void {
                    $product->status = true;
                    $product->save();
                });
            }),

            Action::make(__('Not Active'), 'not_active', function (Enumerable $models): void {
                $models->each(function (Product $product): void {
                    $product->status = false;
                    $product->save();
                });
            }),
        ];
    }

}
