<?php

namespace Modules\Setting\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Core\Entities\Role;
use Modules\User\Entities\User;

class AdminsRoles extends Component
{
    use WithPagination;

    public string $name = '';

    public ?string $display_name = null;

    public ?string $description = null;

    public function removeUser(int $id)
    {
        User::query()->find($id)->delete();

        $this->dispatchBrowserEvent('user-removed');

        $this->dispatchBrowserEvent('notify', [
            'title' => __('Deleted'),
            'message' => __("Admin deleted successfully!"),
        ]);
    }

    public function render()
    {
        return view('setting::livewire.admins-roles', [
            'roles' => Role::with('users')
                ->where('name', '<>', config('starterkit.core.config.users.default_role'))
                ->limit(3)
                ->orderByDesc('created_at')
                ->get(),
            'users' => User::whereHas('roles', function (Builder $query) {
                    $query->where('name', '<>', config('starterkit.core.config.users.default_role'));
                })
                ->orderByDesc('created_at')
                ->paginate(3),
        ]);
    }
}
