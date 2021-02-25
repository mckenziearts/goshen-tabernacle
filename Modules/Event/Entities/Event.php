<?php

namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use InteractsWithMedia;

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

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->update(['slug' => $model->title]);
        });
    }

    /**
     * Determine if an event is public.
     *
     * @return bool
     */
    public function isPublic(): bool
    {
        return $this->privacy === 'public';
    }

    /**
     * Determine if an event is an invitation.
     *
     * @return bool
     */
    public function isInvitation(): bool
    {
        return $this->privacy === 'invitation';
    }

    /**
     * Set the proper slug attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        if (static::query()->where('slug', $slug = Str::slug($value))->exists()) {
            $slug = "{$slug}-{$this->id}";
        }

        $this->attributes['slug'] = $slug;
    }

    /**
     * Return custom color attribute.
     *
     * @return string
     */
    public function getPrivacyColorAttribute(): string
    {
        switch ($this->privacy) {
            case 'public':
                return 'bg-green-100 text-green-800';
            case 'private':
                return 'bg-yellow-100 text-yellow-800';
            case 'invitation':
                return 'bg-blue-100 text-blue-800';
        }
    }

    /**
     * Return the formatted privacy attribute.
     *
     * @return \Illuminate\Contracts\Translation\Translator|string|null
     */
    public function getPrivacyFormattedAttribute(): string
    {
        switch ($this->privacy) {
            case 'public':
                return __('Public');
            case 'private':
                return __('Church members');
            case 'invitation':
                return __('By invitation');
        }
    }
}
