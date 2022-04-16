<div class="bg-white dark:bg-secondary-800">
    <form wire:submit.prevent="save">
        <div class="p-4 sm:px-5 sm:py-4 border-b border-secondary-100 dark:border-secondary-700">
            <h3 class="flex items-center text-lg leading-6 font-medium text-secondary-900 dark:text-white">
                {{ __('Ajouter un livre') }}
            </h3>
        </div>

        <div class="relative p-4 sm:px-5">
            <div class="space-y-4 sm:space-y-5">
                <x-forms.group label="Avatar" for="preview" :error="$errors->first('preview')" noShadow>
                    <x-forms.avatar-upload wire:model.defer="preview" id="preview">
                        <span class="h-12 w-12 rounded-md overflow-hidden bg-secondary-100 dark:bg-secondary-700 flex items-center justify-center">
                            @if ($preview)
                                <img class="h-12 w-12 object-cover" src="{{ $preview->temporaryUrl() }}" alt="Book preview">
                            @elseif($previewImage)
                                <img class="h-12 w-12 object-cover" src="{{ $previewImage }}" alt="Book preview">
                            @else
                                <svg class="h-8 w-8 text-secondary-300 dark:text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            @endif
                        </span>
                    </x-forms.avatar-upload>
                </x-forms.group>
                <x-forms.group label="Nom" for="name" :error="$errors->first('name')" isRequired>
                    <x-forms.input wire:model.defer="name" type="text" id="name" placeholder="Nom du livre" autocomplete="off" />
                </x-forms.group>
                <x-forms.group label="Edition" for="edition" :error="$errors->first('edition')">
                    <x-forms.input wire:model.defer="edition" type="text" id="edition" autocomplete="off" />
                </x-forms.group>
            </div>
        </div>

        <div class="px-4 py-3 sm:px-6">
            <div class="sm:flex sm:items-center sm:justify-between sm:flex-row-reverse">
                @if($bookId)
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <x-danger-button wire:click="delete" type="button">
                            <x-loader wire:loading wire:target="delete" class="text-white" />
                            {{ __('Supprimer') }}
                        </x-danger-button>
                    </span>
                @endif
                <div class="mt-3 sm:mt-0 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <x-button wire:click="save" type="button">
                            <x-loader wire:loading wire:target="save" class="text-white" />
                            {{ __('Enregistrer') }}
                        </x-button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <x-default-button wire:click="$emit('closeModal')" type="button">
                            {{ __('Annuler') }}
                        </x-default-button>
                    </span>
                </div>
            </div>
        </div>
    </form>
</div>
