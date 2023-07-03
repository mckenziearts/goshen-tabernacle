<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\HasSlug;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * @mixin IdeHelperSong
 */
final class Song extends Model implements Viewable
{
    use HasFactory;
    use HasSlug;
    use InteractsWithViews;

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
        // @phpstan-ignore-next-line
        return match ($this->type) {
            'cantique' => __('Cantique'),
            'inspiration' => __('Chant d\'inspiration'),
            'victory' => __('Chant de victoire'),
        };
    }

    public function excerpt(int $limit = 110): string
    {
        return Str::limit(strip_tags($this->content), $limit);
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
