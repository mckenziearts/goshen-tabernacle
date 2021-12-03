<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\User\Traits\HasProfilePhoto;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasFactory,
        HasProfilePhoto,
        HasRoles,
        InteractsWithMedia,
        Notifiable;

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
        'is_member',
        'joined_at',
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
        'joined_at' => 'datetime',
    ];

    /**
     * The dynamic attributes from mutators that should be returned with the user object.
     *
     * @var array
     */
    protected $appends = [
        'full_name',
        'profile_photo_url',
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

        static::deleting(function ($model) {
            $model->roles()->detach();
        });
    }

    public function isAdmin(): bool
    {
        return $this->hasRole(config('starterkit.core.config.users.admin_role'));
    }

    public function isManager(): bool
    {
        return $this->hasRole('manager');
    }

    public function isUser(): bool
    {
        return $this->hasRole(config('starterkit.core.config.users.default_role'));
    }

    public function isVerified(): bool
    {
        return $this->email_verified_at !== null;
    }

    public function getFullNameAttribute(): string
    {
        return $this->last_name
            ? $this->first_name . ' ' . $this->last_name
            : $this->first_name;
    }

    public function getBirthDateFormattedAttribute(): string
    {
        if ($this->birth_date) {
            return $this->birth_date->formatLocalized('%d, %B %Y');
        }

        return __('Not defined');
    }

    public function getRolesLabelAttribute(): string
    {
        $roles = $this->roles()->pluck('display_name')->toArray();

        if (count($roles)) {
            return implode(', ', array_map(function ($item) {
                return ucwords($item);
            }, $roles));
        }

        return 'N/A';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png']);
    }
}
