<div class="bg-white dark:bg-secondary-800">
    <form wire:submit.prevent="save">
        <div class="p-4 sm:px-5 sm:py-4 border-b border-secondary-100 dark:border-secondary-700">
            <h3 class="flex items-center text-lg leading-6 font-medium text-secondary-900 dark:text-white">
                {{ __('Ajouter un chant/cantique') }}
            </h3>
        </div>

        <div class="relative p-4 sm:px-5">
            <div class="space-y-4 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-5">
                <x-forms.group class="sm:col-span-2" label="Titre" for="title" :error="$errors->first('title')" isRequired>
                    <x-forms.input wire:model.defer="title" type="text" id="title" placeholder="Titre du chant/cantique" autocomplete="off" />
                </x-forms.group>
                <x-forms.group class="sm:col-span-2" label="Contenu du chant" for="content" :error="$errors->first('content')">
                    <livewire:dashboard::forms.trix />
                </x-forms.group>
            </div>
        </div>

        <div class="px-4 py-3 sm:px-6">
            <div class="sm:flex sm:items-center sm:justify-between sm:flex-row-reverse">
                @if($songId)
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <x-danger-button wire:click="delete" type="button">
                            <x-loader wire:loading wire:target="delete" class="text-white" />
                            {{ __('Supprimer') }}
                        </x-danger-button>
                    </span>
                @endif
                <div class="mt-3 sm:mt-0 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <x-button type="submit">
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
