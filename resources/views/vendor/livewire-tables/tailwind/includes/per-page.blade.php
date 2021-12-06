@if ($paginationEnabled && $showPerPage)
    <div class="w-full md:w-auto ml-0 md:ml-2">
        <select
            wire:model="perPage"
            id="perPage"
            class="block w-full border-secondary-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 dark:bg-secondary-700 dark:text-white dark:border-secondary-600"
        >
            @foreach ($perPageAccepted as $item)
                <option value="{{ $item }}">{{ $item === -1 ? __('All') : $item }}</option>
            @endforeach
        </select>
    </div>
@endif
