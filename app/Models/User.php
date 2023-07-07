<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasProfilePhoto;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

/**
 * @mixin IdeHelperUser
 */
final class User extends Authenticatable implements HasMedia, FilamentUser, HasAvatar, HasName
{
    use HasFactory;
    use HasProfilePhoto;
    use HasRoles;
    use InteractsWithMedia;
    use Notifiable;

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

    protected $hidden = [
        'password',
        'remember_token',
        'last_login_at',
        'last_login_ip',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'birth_date' => 'date',
        'joined_at' => 'datetime',
    ];

    protected $appends = [
        'full_name',
        'profile_photo_url',
        'roles_label',
        'birth_date_formatted',
        'formatted_gender',
    ];

    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($model): void {
            $model->roles()->detach();
        });
    }

    public function isAdmin(): bool
    {
        return $this->hasRole((string) config('goshen.users.admin_role'));
    }

    public function isManager(): bool
    {
        return $this->hasRole('manager');
    }

    public function isUser(): bool
    {
        return $this->hasRole((string) config('goshen.users.default_role'));
    }

    public function canAccessFilament(): bool
    {
        return str_ends_with($this->email, '@goshen-tabernacle.com') || $this->isAdmin() || $this->isManager() || $this->hasRole('super_admin');
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->profile_photo_url;
    }

    public function isVerified(): bool
    {
        return null !== $this->email_verified_at;
    }

    public function joinedAt(): ?Carbon
    {
        return $this->joined_at;
    }

    public function birthDate(): ?Carbon
    {
        return $this->birth_date;
    }

    public function getFullNameAttribute(): string
    {
        return $this->last_name
            ? $this->first_name.' '.$this->last_name
            : $this->first_name;
    }

    public function getFilamentName(): string
    {
        return $this->full_name;
    }

    public function getBirthDateFormattedAttribute(): string
    {
        if ($this->birth_date) {
            return $this->birth_date->isoFormat('%d, %B %Y');
        }

        return __('Not defined');
    }

    public function getFormattedGenderAttribute(): string
    {
        return match ($this->gender) {
            'male' => __('Homme'),
            'female' => __('Femme'),
        };
    }

    public function getAge(): ?int
    {
        if ($this->birth_date) {
            return Carbon::parse($this->birth_date)->age;
        }

        return null;
    }

    public function getRolesLabelAttribute(): string
    {
        $roles = $this->roles()->pluck('display_name')->toArray();

        if (count($roles)) {
            return implode(', ', array_map(fn ($item) => ucwords((string) $item), $roles));
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
