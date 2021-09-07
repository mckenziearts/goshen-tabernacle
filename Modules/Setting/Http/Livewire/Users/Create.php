<?php

namespace Modules\Setting\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\Setting\Entities\Role;
use Modules\Setting\Notifications\AdminSendCredentials;
use Modules\Setting\Rules\Phone;
use Modules\Setting\Rules\RealEmailValidator;

class Create extends Component
{
    /**
     * Indicate if user will receive mail with credentials.
     *
     * @var bool
     */
    public bool $send_mail = false;

    public string $email = '';

    public ?string $password = null;

    public string $first_name = '';

    public string $last_name = '';

    public string $gender = 'male';

    public ?string $phone_number = null;

    public ?int $role_id = null;

    /**
     * Define if the choose role is an admin role.
     *
     * @var bool
     */
    public bool $is_admin = false;

    /**
     * Generate a random 10 characters password.
     *
     * @return void
     */
    public function generate()
    {
        $this->password = substr(strtoupper(uniqid(Str::random(10))), 0, 10);

        $this->resetErrorBag(['password']);
    }

    public function updated(string $field)
    {
        $this->validateOnly($field, $this->rules(), $this->messages());
    }

    public function updatedRoleId(int $id)
    {
        $chooseRole = Role::findById($id);

        $this->is_admin = $chooseRole->name === config('modules.setting.users.admin_role');
    }

    public function store()
    {
        $this->validate($this->rules(), $this->messages());

        $user = User::query()->create([
            'email'        => $this->email,
            'first_name'   => $this->first_name,
            'last_name'    => $this->last_name,
            'password'     => Hash::make($this->password),
            'phone_number' => $this->phone_number,
            'gender' => $this->gender,
            'email_verified_at' => now()->toDateTimeString(),
        ]);

        $role = Role::findById((int) $this->role_id);
        $user->assignRole([$role->name]);

        if ($this->send_mail) {
            $user->notify(new AdminSendCredentials($this->password));
        }

        session()->flash('success', __('Admin :user cree avec succes.', ['user' => $user->full_name]));

        $this->redirectRoute('admin.settings.users');
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email'),
                new RealEmailValidator(),
            ],
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:8',
            'role_id' => 'required',
            'phone_number' => [
                'nullable',
                new Phone(),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('Email est requis'),
            'email.email' => __('Cette Adresse Email n\'est pas une adresse mail valide'),
            'email.unique' => __('Cette adresse email est deja utilise'),
            'first_name.required' => __('Le nom est requis'),
            'last_name.required' => __('Le prenom de l\' utilisateur est requis'),
            'password.required' => __('Le mot de passe est requis'),
            'role_id.required' => __('Le role de cet utilisateur est obligatoire'),
            'phone_number.*' => __('Ce numero est incorrect'),
        ];
    }

    public function render()
    {
        return view('setting::livewire.users.create', [
            'roles' => Role::query()
                ->select(['id', 'display_name', 'name'])
                ->where('name', '<>', config('modules.setting.users.default_role'))
                ->get(),
        ]);
    }
}
