<?php namespace Anomaly\StreamsTheme;

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
    protected $tag = 'Anomaly\StreamsTheme\StreamsThemeTag';
}
