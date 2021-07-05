<?php

namespace Modules\Setting\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Setting\Entities\Role;

class Browse extends Component
{
    use WithPagination;

    public string $name = '';

    public ?string $display_name = null;

    public ?string $description = null;

    /**
     * Toggle Modal to create a new role.
     *
     * @var bool
     */
    public bool $displayModal = false;

    /**
     * Add new role.
     *
     * @return void
     */
    public function addNewRole()
    {
        $this->validate([
            'name' => 'required|unique:roles',
        ], [
            'name.required' => __('The role name is required.'),
            'name.unique' => __('This name is already used.')
        ]);

        Role::create([
            'name' => $this->name,
            'display_name' => $this->role_display_name,
            'description' => $this->role_description,
        ]);

        $this->dispatchBrowserEvent('modal-close');

        $this->dispatchBrowserEvent('notify', [
            'title' => __('Saved!'),
            'message' => __("Role saved successfully!"),
        ]);

        $this->displayModal = false;

        $this->name = '';
        $this->role_display_name = '';
        $this->role_description = '';
    }

    /**
     * Action provide to launch the modal.
     *
     * @return void
     */
    public function launchCreateModal()
    {
        $this->displayModal = true;
    }

    /**
     * Close modal.
     *
     * @return void
     */
    public function cancel()
    {
        $this->displayModal = false;

        $this->resetErrorBag();
    }

    /**
     * Remove a user from the storage.
     *
     * @param  int  $id
     * @throws \Exception
     */
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
        return view('setting::livewire.users.browse', [
            'roles' => Role::query()
                ->with('users')
                ->where('name', '<>', config('modules.setting.users.default_role'))
                ->limit(3)
                ->orderBy('created_at')
                ->get(),
            'users' => User::query()
                ->whereHas('roles', function (Builder $query) {
                    $query->where('name', '<>', config('modules.setting.users.default_role'));
                })
                ->orderBy('created_at', 'desc')
                ->paginate(3),
        ]);
    }
}
