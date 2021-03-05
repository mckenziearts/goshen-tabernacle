<?php

namespace Modules\Event\Traits;

trait WithAttributes
{
    /**
     * Event description.
     *
     * @var string
     */
    public $title;

    /**
     * Event description.
     *
     * @var string
     */
    public $description;

    /**
     * Event Start date.
     *
     * @var string
     */
    public $start_date;

    /**
     * Event end date.
     *
     * @var string
     */
    public $end_date;

    /**
     * Privacy of the event.
     *
     * @var string
     */
    public $privacy = 'public';

    /**
     * Is visible status for event.
     *
     * @var bool
     */
    public $is_visible = false;

    /**
     * Media library component.
     *
     * @var string[]
     */
    public $mediaComponentNames = ['cover'];

    /**
     * Event cover image.
     *
     * @var mixed
     */
    public $cover;
}
