<?php

declare(strict_types=1);

namespace App\Traits;

trait HasProfilePhoto
{
    public function getProfilePhotoUrlAttribute(): string
    {
        if ('storage' === $this->avatar_type) {
            return $this->getFirstMediaUrl('avatar');
        }

        return $this->defaultProfilePhotoUrl();
    }

    protected function defaultProfilePhotoUrl(): string
    {
        return 'https://ui-avatars.com/api/?name='.urlencode($this->full_name).'&color=065F46&background=D1FAE5';
    }
}
