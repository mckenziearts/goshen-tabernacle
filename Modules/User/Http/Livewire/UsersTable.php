<?php

namespace Modules\User\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Modules\User\Entities\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UsersTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Avatar')
                ->format(function($value, $column, $row) {
                    return "<img class='inline-block h-8 w-8 rounded-full' src='{$row->profile_photo_url}' alt='avatar user' />";
                })
                ->asHtml(),
            Column::make('First Name', 'first_name')
                ->searchable()
                ->sortable(),
            Column::make('Last Name', 'last_name')
                ->searchable()
                ->sortable(),
            Column::make('Is Member', 'is_member')
                ->format(function ($value) {
                    return $value ? __('Yes') : __('No');
                }),
            Column::make('Joined At', 'joined_at')
                ->sortable()
                ->format(function ($value) {
                    return $value ? "<time datetime='" . $value->format('Y-m-d') . "' class='capitalize text-secondary-500 dark:text-secondary-400'>" . $value->formatLocalized('%d %B, %Y') . '</time>' : '';
                })->asHtml(),
        ];
    }

    public function getTableRowUrl($row): string
    {
        return route('cp.users.show', $row);
    }

    public function query(): Builder
    {
        return User::query()->whereHas('roles', function (Builder $query) {
            $query->where('name', config('starterkit.core.config.users.default_role'));
        });
    }
}
