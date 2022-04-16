<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-secondary-900">{{ __('Chants & Cantiques') }}</h1>
            <p class="mt-2 text-sm text-secondary-700">{{ __('Une liste de tous les chants et cantiques, avec leur nom, leur titre, leur auteur et les liens vers les fichiers audio et vidéo.') }}</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <x-button wire:click="$emit('openModal', 'song::cantiques.form')" type="button">{{ __('Ajouter un chant') }}</x-button>
        </div>
    </div>
    <div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
        <table class="min-w-full divide-y divide-secondary-300">
            <thead class="bg-secondary-50">
            <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-secondary-900 sm:pl-6">{{ __('Titre') }}</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-secondary-900 sm:table-cell">{{ __('Type') }}</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-secondary-900">{{ __('Date') }}</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">{{ __('Éditer') }}</span>
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-secondary-200 bg-white">
                @foreach($songs as $song)
                    <tr>
                        <td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-secondary-900 sm:w-auto sm:max-w-none sm:pl-6">
                            {{ $song->title }}
                            <dl class="font-normal lg:hidden">
                                <dt class="sr-only">Title</dt>
                                <dd class="mt-1 truncate text-secondary-700">{{ $song->title }}</dd>
                                <dt class="sr-only sm:hidden">Email</dt>
                                <dd class="mt-1 truncate text-secondary-500 sm:hidden">{{ $song->author?->name }}</dd>
                            </dl>
                        </td>
                        <td class="hidden px-3 py-4 text-sm text-secondary-500 sm:table-cell">{{ $song->type_formatted }}</td>
                        <td class="px-3 py-4 text-sm text-secondary-500">{{ $song->created_at->formatLocalized('%d %B %Y') }}</td>
                        <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <button wire:click="$emit('openModal', 'song::cantiques.form', {{ json_encode([$song->id]) }})" type="button" class="text-primary-600 hover:text-primary-900">Éditer<span class="sr-only">, {{ $song->title }}</span></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
