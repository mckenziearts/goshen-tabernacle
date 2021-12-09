<?php

namespace Modules\Setting\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\Core\Entities\Role;
use Modules\User\Entities\User;

class CreateAdmin extends Component
{
    public bool $send_mail = false;

    public string $email = '';

    public ?string $password = null;

    public string $first_name = '';

    public string $last_name = '';

    public string $gender = 'male';

    public ?string $phone_number = null;

    public ?int $role_id = null;

    public bool $is_admin = false;

    public function generate()
    {
        $this->password = substr(strtoupper(uniqid(Str::random(10))), 0, 10);

        $this->resetErrorBag(['password']);
    }

    public function updatedRoleId(int $id)
    {
        $chooseRole = Role::findById($id);

        $this->is_admin = $chooseRole->name === config('modules.setting.users.admin_role');
    }

    public function store()
    {
        $this->validate($this->rules());

        $user = User::query()->create([
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'password' => Hash::make($this->password),
            'phone_number' => $this->phone_number,
            'gender' => $this->gender,
            'email_verified_at' => now()->toDateTimeString(),
        ]);

        $role = Role::findById((int) $this->role_id);
        $user->assignRole([$role->name]);

        session()->flash('success', __('Admin :user create successfully.', ['user' => $user->full_name]));

        $this->redirectRoute('cp.settings.users');
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email'),
            ],
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:8',
            'role_id' => 'required',
            'phone_number' => [
                'nullable',
            ]
        ];
    }

    public function render()
    {
        return view('setting::livewire.create-admin', [
            'roles' => Role::select(['id', 'display_name', 'name'])
                ->where('name', '<>', config('starterkit.core.config.users.default_role'))
                ->get()
        ]);
    }
}
