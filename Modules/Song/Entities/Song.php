<?php

namespace Modules\Song\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Core\Traits\HasSlug;

class Song extends Model
{
    use HasFactory, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'author_id',
        'book_id',
        'type',
        'audio_link',
        'video_link',
    ];

    public function getTypeFormattedAttribute(): string
    {
        return match ($this->type) {
            'cantique' => __('Cantique'),
            'inspiration' => __('Chant d\'inspiration'),
            'victory' => __('Chant de victoire'),
        };
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
