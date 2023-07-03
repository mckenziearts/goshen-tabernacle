<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @mixin IdeHelperEvent
 */
final class Event extends Model implements HasMedia
{
    use HasFactory;
    use HasSlug;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'start_date',
        'end_date',
        'privacy',
        'is_visible',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_visible' => 'boolean',
    ];

    public function isPublic(): bool
    {
        return 'public' === $this->privacy;
    }

    public function isInvitation(): bool
    {
        return 'invitation' === $this->privacy;
    }

    public function isPrivate(): bool
    {
        return 'private' === $this->privacy;
    }

    public function getPrivacyFormattedAttribute(): string
    {
        // @phpstan-ignore-next-line
        return match ($this->privacy) {
            'public' => __('Public'),
            'private' => __('Membres de l\'église'),
            'invitation' => __('Par invitation'),
        };
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png']);
    }

    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('is_visible', true);
    }

    public function scopePublic(Builder $query): Builder
    {
        return $query->where('privacy', 'public');
    }

    public function scopeForEveryone(Builder $query): Builder
    {
        return $query->visible()->public(); // @phpstan-ignore-line
    }
}
