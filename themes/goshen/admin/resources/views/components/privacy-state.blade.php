@props(['key', 'value'])

<?php $color = '' ?>

@if($key === 'public')
    <?php $color = 'bg-green-100 text-green-800'; ?>
@elseif ($key === 'private')
    <?php $color = 'bg-yellow-100 text-yellow-800'; ?>
@else
    <?php $color = 'bg-blue-100 text-blue-800'; ?>
@endif

<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $color }}">
    {{ $value }}
</span>
