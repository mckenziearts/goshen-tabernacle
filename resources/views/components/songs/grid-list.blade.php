@props(['songs'])

<ul role="list" {{ $attributes->merge(['class' => 'grid gap-5 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3']) }}>
    @foreach($songs as $song)
        <li>
            <div class="space-y-2">
                <a href="{{ route('chants.show', $song) }}" class="inline-flex text-sm font-medium leading-5 text-purple-600 hover:text-purple-700 hover:underline">
                    {{ $song->title }}
                </a>
                <p class="text-gray-500 text-sm leading-5">
                    @if($song->book)
                        <a href="{{ route('chants.book', $song->book) }}" class="hover:underline hover:text-gray-900">{{ $song->book->name }}</a>
                    @endif
                    <span class="inline-flex ml-2">#{{ $song->id }}</span>
                </p>
            </div>
        </li>
    @endforeach
</ul>
