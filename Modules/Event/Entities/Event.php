<?php

namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Core\Traits\HasSlug;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'start_date',
        'end_date',
        'privacy',
        'is_visible',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_visible' => 'boolean',
    ];

    public function isPublic(): bool
    {
        return $this->privacy === 'public';
    }

    public function isInvitation(): bool
    {
        return $this->privacy === 'invitation';
    }

    public function isPrivate(): bool
    {
        return $this->privacy === 'private';
    }

    public function getPrivacyFormattedAttribute(): string
    {
        return match ($this->privacy) {
            'public' => __('Public'),
            'private' => __('Church members'),
            'invitation' => __('By invitation'),
        };
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png']);
    }
}
