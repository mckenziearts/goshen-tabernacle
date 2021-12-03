<?php

namespace Modules\User\Http\Livewire;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Entities\User;

class BrowseUsers extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return User::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\ImageColumn::make('avatar')
                ->size(40)
                ->rounded(),
            Tables\Columns\TextColumn::make('first_name'),
            Tables\Columns\TextColumn::make('last_name'),
            Tables\Columns\BadgeColumn::make('status')
                ->colors([
                    'danger' => 'draft',
                    'warning' => 'reviewing',
                    'success' => 'published',
                ]),
            Tables\Columns\BooleanColumn::make('is_member'),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Tables\Filters\Filter::make('published')
                ->query(fn (Builder $query) => $query->where('is_published', true)),
            Tables\Filters\SelectFilter::make('status')
                ->options([
                    'draft' => 'Draft',
                    'in_review' => 'In Review',
                    'approved' => 'Approved',
                ]),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\LinkAction::make('edit')
                ->url(fn (User $record): string => route('cp.users.edit', $record)),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            Tables\Actions\BulkAction::make('delete')
                ->label(__('Delete selected'))
                ->color('danger')
                ->action(function (Collection $records): void {
                    $records->each->delete();
                })
                ->requiresConfirmation(),
        ];
    }

    public function render(): View
    {
        return view('user::livewire.browse-users');
    }
}
