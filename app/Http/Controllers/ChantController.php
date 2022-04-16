<?php

namespace App\Http\Controllers;

use App\Support\Collection;
use Illuminate\Http\Request;
use Modules\Song\Entities\Author;
use Modules\Song\Entities\Book;
use Modules\Song\Entities\Song;

class ChantController extends Controller
{
    public function index(Request $request)
    {
        seo()
            ->site('Goshen Tabernacle L\'église des 7 Tonnerres')
            ->title('Goshen Tabernacle L\'église des 7 Tonnerres | Goshen Tabernacle')
            ->description(default: 'L\'église c\'est plus qu\'un lieu, c\'est chacun de nous. Dans cette nouvelle saison, année de brisement de limites, nous croyons qu\'il est possible d\'être plus connectés que jamais.')
            ->image(default: fn () => asset('/images/social-card.png'))
            ->twitterImage(default: fn () => asset('/images/social-card.png'))
            ->tag('keywords', '7 tonnerres, goshen-tabernacle, Eglise du message, William Marrion Brahnam, Joseph Coleman, Goshen, Jesus Christ')
            ->tag('twitter:creator', '@monneyarthur')
            ->twitterSite('monneyarthur');

        if ($request->query('letter') && strlen($request->query('letter')) === 1) {
            $songsCollection = Song::with('book')->orderBy('title')->get();

            $songs = (new Collection(
                $songsCollection->filter(function ($item, $key) use ($request) {
                    return substr($item->title, 0, 1) === $request->query('letter');
                })
            ))->paginate(27);

            return view('pages.chants.letter', compact('songs'));
        }

        return view('pages.chants.index', [
            'books' => Book::all(),
            'authors' => Author::withCount('songs')->get(),
            'songs' => Song::orderByViews()->limit(15)->get(),
        ]);
    }

    public function author(Author $author)
    {
        return view('pages.chants.author', [
            'author' => $author->load('songs'),
        ]);
    }

    public function book(Book $book)
    {
        return view('pages.chants.book', [
            'book' => $book->load('songs'),
            'songs' => $book->songs()->paginate(27),
        ]);
    }

    public function show(Song $song)
    {
        views($song)->record();

        seo()
            ->title($song->title . ' | Goshen Tabernacle')
            ->description($song->excerpt(100))
            ->tag('keywords', '7 tonnerres, goshen-tabernacle, Eglise du message, William Marrion Brahnam, Joseph Coleman, Goshen, Jesus Christ, cantiques, louanges, adoration, chants de victoire')
            ->tag('twitter:creator', '@monneyarthur')
            ->image(asset('/images/chantre-albert.jpg'))
            ->twitterImage( asset('/images/chantre-albert.jpg'))
            ->twitterSite('monneyarthur')
            ->withUrl();

        return view('pages.chants.show', [
            'song' => $song->load(['author', 'book']),
        ]);
    }
}
