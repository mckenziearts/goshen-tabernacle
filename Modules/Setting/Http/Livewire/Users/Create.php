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

    /**
     * Admin email address.
     *
     * @var string
     */
    public $email;

    /**
     * Admin password.
     *
     * @var string
     */
    public $password;

    /**
     * Admin first name.
     *
     * @var string
     */
    public $first_name;

    /**
     * Admin last name.
     *
     * @var string
     */
    public $last_name;

    /**
     * Admin default gender.
     *
     * @var string
     */
    public $gender = 'male';

    /**
     * Phone number attribute.
     *
     * @var string
     */
    public $phone_number;

    /**
     * Admin define role id.
     *
     * @var integer
     */
    public $role_id;

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

    /**
     * Real-time component validation.
     *
     * @param  string  $field
     * @throws \Illuminate\Validation\ValidationException
     * @return void
     */
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules(), $this->messages());
    }

    /**
     * Update roleId to determine if the choose role is an admin role.
     *
     * @param  string  $id
     * @return void
     */
    public function updatedRoleId($id)
    {
        $chooseRole = Role::findById($id);

        $this->is_admin = $chooseRole->name === config('modules.setting.users.admin_role');
    }

    /**
     * Store/Update a entry to the storage.
     *
     * @return void
     */
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

        session()->flash('success', __('Admin :user added successfully.', ['user' => $user->full_name]));

        $this->redirectRoute('admin.settings.users');
    }

    /**
     * Component validation rules.
     *
     * @return string[]
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email'),
                new RealEmailValidator()
            ],
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:8',
            'role_id' => 'required',
            'phone_number' => [
                'nullable',
                new Phone()
            ]
        ];
    }

    /**
     * Custom error messages.
     *
     * @return string[]
     */
    public function messages()
    {
        return [
            'email.required' => __("Email is required"),
            'email.email' => __("This Email is not a valid email address"),
            'email.unique' => __("This email address is already used"),
            'first_name.required' => __("Admin first name is required"),
            'last_name.required' => __("Admin last name is required"),
            'password.required' => __("Password is required"),
            'role_id.required' => __("The admin role is required"),
            'phone_number.*' => __("This phone number is not a valid number"),
        ];
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('setting::livewire.users.create', [
            'roles' => Role::query()
                ->select(['id', 'display_name', 'name'])
                ->where('name', '<>', config('modules.setting.users.default_role'))
                ->get()
        ]);
    }
}
