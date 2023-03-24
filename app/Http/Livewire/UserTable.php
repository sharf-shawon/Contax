<?php

namespace App\Http\Livewire;

use \App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

class UserTable extends PowerGridComponent
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
        $model = User::query()->get();
        return PowerGrid::eloquent($model)
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('email')
            ->addColumn('phone')
            ->addColumn('cards', function(User $model) {
                return $model->cards()->count();
            })
            ->addColumn('created_at')
            ->addColumn('created_at_formatted', function(User $model) {
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
                ->title(__('Name'))
                ->field('name')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title(__('Email'))
                ->field('email')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title(__('Phone#'))
                ->field('phone')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title(__('Cards'))
                ->field('cards')
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
           Button::add('edit')
               ->caption(__('Edit'))
               ->class('inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150')
               ->route('user.edit', ['user' => 'id']),

           Button::add('destroy')
               ->caption(__('Delete'))
               ->class('inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red focus:bg-red-700 dark:focus:bg-red active:bg-red-900 dark:active:red-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150')
               ->route('user.destroy', ['user' => 'id'])
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
           $updated = User::query()->find($data['id'])->update([
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
