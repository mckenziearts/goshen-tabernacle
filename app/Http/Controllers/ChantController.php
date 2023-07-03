<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Song;
use App\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class ChantController extends Controller
{
    public function index(Request $request): View
    {
        seo()
            ->site('Goshen Tabernacle L\'église des 7 Tonnerres')
            ->title('Goshen Tabernacle L\'église des 7 Tonnerres | Goshen Tabernacle')
            ->description(default: "L'église c'est plus qu'un lieu, c'est chacun de nous. Dans cette nouvelle saison, année de brisement de limites, nous croyons qu'il est possible d'être plus connectés que jamais.")
            ->image(default: fn () => asset('/images/social-card.png'))
            ->twitterImage(default: fn () => asset('/images/social-card.png'))
            ->tag('keywords', '7 tonnerres, goshen-tabernacle, Église du message, William Marrion Branham, Joseph Coleman, Goshen, Jesus Christ')
            ->tag('twitter:creator', '@lechretiendev')
            ->twitterSite('lechretiendev');

        // @phpstan-ignore-next-line
        if ($request->query('letter') && 1 === mb_strlen($request->query('letter'))) {
            $songsCollection = Song::with('book')->orderBy('title')->get();

            $songs = (new Collection(
                items: $songsCollection->filter(
                    fn (Song $item, string $key) => mb_substr($item->title, 0, 1) === $request->query('letter') // @phpstan-ignore-line
                )
            ))->paginate(27);

            return view('pages.chants.letter', compact('songs'));
        }

        return view('pages.chants.index', [
            'books' => Book::all(),
            'authors' => Author::withCount('songs')->get(),
            'songs' => Song::orderByViews()->limit(15)->get(),
        ]);
    }

    public function author(Author $author): View
    {
        return view('pages.chants.author', [
            'author' => $author->load('songs'),
        ]);
    }

    public function book(Book $book): View
    {
        return view('pages.chants.book', [
            'book' => $book->load('songs'),
            'songs' => $book->songs()->paginate(27),
        ]);
    }

    public function show(Song $song): View
    {
        views($song)->record();

        seo()
            ->title($song->title.' | Goshen Tabernacle')
            ->description($song->excerpt(100))
            ->tag('keywords', '7 tonnerres, goshen-tabernacle, Eglise du message, William Marrion Branham, Joseph Coleman, Goshen, Jesus Christ, cantiques, louanges, adoration, chants de victoire')
            ->tag('twitter:creator', '@lechretiendev')
            ->image(asset('/images/chantre-albert.jpg'))
            ->twitterImage(asset('/images/chantre-albert.jpg'))
            ->twitterSite('lechretiendev')
            ->withUrl();

        return view('pages.chants.show', [
            'song' => $song->load(['author', 'book']),
        ]);
    }
}
