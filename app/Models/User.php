<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'phone_number',
        'gender',
        'address',
        'profession',
        'latitude',
        'longitude',
        'avatar_type',
        'avatar_location',
        'last_login_at',
        'last_login_ip',
        'email_verified_at',
        'birth_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'birth_date' => 'datetime',
    ];

    /**
     * The dynamic attributes from mutators that should be returned with the user object.
     *
     * @var array
     */
    protected $appends = [
        'full_name',
        'picture',
        'roles_label',
        'birth_date_formatted',
    ];

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function($model) {
            $model->roles()->detach();
        });
    }

    /**
     * Define if user is an admin
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(config('setting.users.admin_role'));
    }

    /**
     * Define if an user account is verified.
     *
     * @return bool
     */
    public function isVerified(): bool
    {
        return $this->email_verified_at !== null;
    }

    /**
     * Return User Full Name.
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->last_name
            ? $this->first_name . ' ' . $this->last_name
            : $this->first_name;
    }

    /**
     * Return Formatted Birth Date Attribute.
     *
     * @return \Illuminate\Contracts\Translation\Translator|string
     */
    public function getBirthDateFormattedAttribute()
    {
        if ($this->birth_date) {
            return $this->birth_date->formatLocalized('%d, %B %Y');
        }

        return __('Not defined');
    }

    /**
     * Get User roles name.
     *
     * @return string
     */
    public function getRolesLabelAttribute(): string
    {
        $roles = $this->roles()->pluck('display_name')->toArray();

        if (\count($roles)) {
            return implode(', ', array_map(function ($item) {
                return ucwords($item);
            }, $roles));
        }

        return 'N/A';
    }

    /**
     * Get user profile picture.
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|mixed|string
     */
    public function getPictureAttribute()
    {
        switch ($this->avatar_type) {
            case 'gravatar':
                return gravatar()->get($this->email);

            case 'storage':
                return Storage::disk('avatars')->url($this->avatar_location);
        }
    }
}
