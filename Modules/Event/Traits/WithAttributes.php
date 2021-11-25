<?php

namespace Modules\Event\Traits;

trait WithAttributes
{
    public string $title = '';

    public ?string $description = null;

    public ?string $start_date = '';

    public ?string $end_date = '';

    public string $privacy = 'public';

    public bool $is_visible = false;

    public $mediaComponentNames = ['cover'];

    public $cover;
}
