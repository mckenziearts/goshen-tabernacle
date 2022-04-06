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
            ->title($song->title)
            ->description($song->excerpt(100))
            ->withUrl();

        return view('pages.chants.show', [
            'song' => $song->load(['author', 'book']),
        ]);
    }
}
