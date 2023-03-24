<?php

namespace App\Http\Livewire;

use \App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

class OrderTable extends PowerGridComponent
{
    use ActionButton;

    public function setUp()
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput();
    }

    public function dataSource(): array
    {
        $model = Order::query()->get();
        return PowerGrid::eloquent($model)
            ->addColumn('id')
            ->addColumn('status')
            ->addColumn('user_id')
            ->addColumn('user', function(Order $model) {
                return $model->user->name;
            })
            ->addColumn('payable')
            ->addColumn('paid')
            ->addColumn('created_at_formatted', function(Order $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            })
            ->make();
    }

    public function columns(): array
    {
        return [
            Column::add()
                ->title(__('ID'))
                ->field('id')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title(__('Status'))
                ->field('status')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title(__('User'))
                ->field('user')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title(__('Payable'))
                ->field('payable')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title(__('Paid'))
                ->field('paid')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title(__('Created at'))
                ->field('created_at')
                ->hidden(),

            Column::add()
                ->title(__('Created at'))
                ->field('created_at_formatted')
                ->makeInputDatePicker('created_at')
                ->searchable()
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable this section only when you have defined routes for these actions.
    |
    */

    public function actions(): array
    {
       return [
           Button::add('register')
               ->caption(__('CardReg'))
               ->class('inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150')
               ->route('card.register', ['user_id' => 'user_id', 'order_id' => 'id']),

           Button::add('edit')
               ->caption(__('Edit'))
               ->class('inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150')
               ->route('order.edit', ['order' => 'id']),

           Button::add('destroy')
               ->caption(__('Delete'))
               ->class('inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red focus:bg-red-700 dark:focus:bg-red active:bg-red-900 dark:active:red-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150')
               ->route('order.destroy', ['order' => 'id'])
               ->method('delete')
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable this section to use editOnClick() or toggleable() methods
    |
    */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Order::query()->find($data['id'])->update([
                $data['field'] => $data['value']
           ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status, string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field' => __('Custom Field updated successfully!'),
            ],
            "error" => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field' => __('Error updating custom field.'),
            ]
        ];

        return ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);
    }
    */


}
