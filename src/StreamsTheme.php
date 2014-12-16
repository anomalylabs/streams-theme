<?php namespace Anomaly\Streams\Addon\Theme\Streams;

use Anomaly\Streams\Platform\Addon\Theme\Theme;

class StreamsTheme extends Theme
{

    protected $slug = 'streams';

    /**
     * This is an admin theme.
     *
     * @var bool
     */
    protected $admin = true;

    /**
     * The module's tag.
     *
     * @var string
     */
    protected $tag = 'Anomaly\Streams\Addon\Theme\Streams\StreamsThemeTag';
}
